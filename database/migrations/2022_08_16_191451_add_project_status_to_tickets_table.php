<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectStatusToTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->enum('project_status', [1, 2, 3, 4, 5])
                ->nullable()->after('status')
                ->comment("1 => 'welcome_call',
        2 => 'send_welcome_package',
        3 => 'create_charter',
        4 => 'business_license',
        5 => 'apply_for_meter_spot'");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('project_status');
        });
    }
}
