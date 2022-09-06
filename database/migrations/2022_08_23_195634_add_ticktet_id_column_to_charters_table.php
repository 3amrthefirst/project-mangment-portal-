<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTicktetIdColumnToChartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('charters', function (Blueprint $table) {
            $table->unsignedBigInteger('ticket_id')->index()->default(0)->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('charters', function (Blueprint $table) {
            $table->dropColumn('ticket_id');
        });
    }
}
