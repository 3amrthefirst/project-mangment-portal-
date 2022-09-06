<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTicketIdToWellcomeCallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('welcome_calls', function (Blueprint $table) {
            $table->unsignedBigInteger('ticket_id')->after('any_locked_gates')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('welcome_calls', function (Blueprint $table) {
            $table->dropColumn('ticket_id');
        });
    }
}
