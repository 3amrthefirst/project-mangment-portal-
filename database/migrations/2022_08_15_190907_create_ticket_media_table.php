<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_media', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('ticket_id')->index();
            $table->unsignedBigInteger('lead_id')->index();

            $table->string('type');
            $table->string('url', 300);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_media');
    }
}
