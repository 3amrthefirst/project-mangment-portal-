<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charters', function (Blueprint $table) {
            $table->id();
            $table->string('project_name')->nullable();
            $table->string('project_manager')->nullable();
            $table->string('project_address')->nullable();
            $table->enum('project_system_size', ['very_small', 'small', 'medium', 'big', 'very_big'])->nullable();
            $table->string('project_installation_type')->nullable();
            $table->string('project_additional_permits')->nullable();
            $table->string('project_roofer')->nullable();
            $table->string('project_designer')->nullable();
            // ====================================
            $table->string('jurisdiction');
            $table->string('jurisdiction_contact_email')->nullable();
            $table->string('jurisdiction_contact_mobile')->nullable();
            $table->enum('submittal_process', ['inperson', 'email', 'portal', 'postmail']);
            $table->integer('jurisdiction_estimated_duration');

            $table->string('utility_company')->nullable();
            $table->enum('utility_pto_process', ['inperson', 'email', 'portal', 'postmail']);
            $table->string('utility_contact_email')->nullable();
            $table->string('utility_contact_mobile')->nullable();
            $table->integer('utility_estimated_duration');
            // ====================================
            $table->string('roofing_contract_redecking')->nullable();
            $table->string('roofing_shingles')->nullable();

            $table->string('mpu_meter_spot')->nullable();
            $table->string('mpu_shutoff_required')->nullable();

            $table->string('project_valuation')->nullable();
            $table->string('products_manufacturer')->nullable();
            $table->string('inverter_manufacturer_model')->nullable();
            $table->double('products_total_price', 8, 2);
            // ====================================
            $table->dateTime('welcome_call')->nullable();
            $table->dateTime('site_survey')->nullable();
            $table->dateTime('meterspot_date')->nullable();

            $table->dateTime('mpu_application_submission_date_start')->nullable();
            $table->dateTime('mpu_permit_issuance_date_end')->nullable();

            $table->dateTime('solar_application_submission_date_start')->nullable();
            $table->dateTime('solar_permit_issuance_date_end')->nullable();

            $table->dateTime('roofing_application_submission_date_start')->nullable();
            $table->dateTime('roofing_permit_issuance_date_end')->nullable();

            $table->dateTime('roofing_installation_start_time')->nullable();
            $table->dateTime('roofing_installation_complete')->nullable();

            $table->dateTime('mpu_installation_start_time')->nullable();
            $table->dateTime('mpu_installation_complete')->nullable();

            $table->dateTime('solar_installation_start_time')->nullable();
            $table->dateTime('solar_installation_complete')->nullable();

            $table->dateTime('roofing_inspection_start_date')->nullable();
            $table->dateTime('mpu_inspection_start_date')->nullable();
            $table->dateTime('solar_inspection_start_date')->nullable();

            $table->dateTime('pto_application_submittal_date_start')->nullable();
            $table->dateTime('pto_application_submittal_date_end')->nullable();

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
        Schema::dropIfExists('charters');
    }
}
