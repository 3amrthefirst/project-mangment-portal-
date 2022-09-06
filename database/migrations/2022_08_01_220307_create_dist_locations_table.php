<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dist_locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Dist_id');
            $table->unsignedBigInteger('State_id');
            $table->string('WorkHours');
            $table->string('Email');
            $table->string('Phone');
            $table->string('Address');
            $table->double('Lat');
            $table->double('Long');
            $table->integer('Zip');
            $table->string('County');
            $table->foreign('Dist_id')->references('id')->on('distributers')->onDelete('cascade');
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
        Schema::dropIfExists('dist_locations');
    }
}
