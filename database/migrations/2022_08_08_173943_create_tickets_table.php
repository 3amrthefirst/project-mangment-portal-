<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('lead_id');
            $table->unsignedBigInteger('opportunity_id');
            $table->unsignedBigInteger('contract_id');
            $table->unsignedBigInteger('user_id')->default(0);

            $table->dateTime('lead_date');
            $table->string('client_name')->default('');
            $table->string('client_phone')->default('');
            $table->string('client_email')->default('');
            $table->string('client_address')->default('');
            $table->text('note')->nullable();
            $table->enum('status', [1, 2, 3, 4])->index()
                ->default(1)
                ->comment('1 => pending, 2 => assigned, 3 => approved, 4 => rejected');

            $table->string('pm_status')->default('');
            $table->string('financial_status')->default('');

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
        Schema::dropIfExists('tickets');
    }
}
