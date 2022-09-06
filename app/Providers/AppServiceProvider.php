<?php

namespace App\Providers;

use App\Mixins\ResponseMixins;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Response::mixin(new ResponseMixins());

        \Event::listen('eloquent.deleting:*', function ($event, $models) {
            $model = $models[0];
            $table_name = $model->getTable();
            $model_attributes = Schema::getColumnListing($table_name);
            if (in_array('deleted_by', $model_attributes)) {
                if (!isset($model->deleted_by)) {
                    $auth_id = \Auth::id();
                    if (isset($auth_id)) {
                        $model->deleted_by = $auth_id;
                    } else {
                        $model->deleted_by = '1';
                    }
                }
            }
        });


        \Event::listen('eloquent.saving:*', function ($event, $models) {
            $model = $models[0];
            $table_name = $model->getTable();
            $model_attributes = Schema::getColumnListing($table_name);
            if (in_array('created_by', $model_attributes)) {
                if (!isset($model->created_by)) {
                    $auth_id = \Auth::id();
                    if (isset($auth_id)) {
                        $model->created_by = $auth_id;
                    } else {
                        $model->created_by = '1';
                    }
                }
            }
        });

    }
}
