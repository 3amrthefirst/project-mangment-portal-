<?php

namespace Database\Seeders;

use App\Models\Charter;
use Illuminate\Database\Seeder;

class CharterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i <= 20; $i++) {
            $charter = new Charter();
            $charter->project_name = $faker->name;
            $charter->project_manager = $faker->name;
            $charter->project_address = $faker->address;
            $charter->project_system_size = function () {
                $system_size = ['very_small', 'small', 'medium', 'big', 'very_big'];
                return $system_size[range(0, 4)];
            };
            $charter->project_installation_type = '';
            $charter->project_additional_permits = '';
            $charter->project_roofer = '';
            $charter->project_designer = '';

            $charter->jurisdiction = '';
            $charter->jurisdiction_contact_email = $faker->email;
            $charter->jurisdiction_contact_mobile = $faker->phoneNumber;
            $charter->submittal_process = function () {
                $system_size = ['inperson', 'email', 'portal', 'postmail'];
                return $system_size[range(0, 4)];
            };
            $charter->jurisdiction_estimated_duration =  range(10, 100);
            $charter->utility_company = '';
            $charter->utility_pto_process = function () {
                $system_size = ['inperson', 'email', 'portal', 'postmail'];
                return $system_size[range(0, 4)];
            };
            $charter->utility_contact_email = $faker->email;
            $charter->utility_contact_mobile = $faker->phoneNumber;
            $charter->utility_estimated_duration =  range(10, 100);

            $charter->roofing_contract_redecking = '';
            $charter->roofing_shingles = '';
            $charter->mpu_meter_spot = '';
            $charter->mpu_shutoff_required = '';
            $charter->project_valuation = '';
            $charter->products_manufacturer = '';
            $charter->inverter_manufacturer_model = '';
            $charter->products_total_price = range(0, 100);
            $charter->welcome_call = '';
            $charter->site_survey = '';
            $charter->meterspot_date = '';
            $charter->mpu_application_submission_date_start = '';
            $charter->mpu_permit_issuance_date_end = '';
            $charter->solar_application_submission_date_start = '';
            $charter->solar_permit_issuance_date_end = '';
            $charter->roofing_application_submission_date_start = '';
            $charter->roofing_permit_issuance_date_end = '';
            $charter->roofing_installation_start_time = '';
            $charter->roofing_installation_complete = '';
            $charter->mpu_installation_start_time = '';
            $charter->mpu_installation_complete = '';
            $charter->solar_installation_start_time = '';
            $charter->solar_installation_complete = '';
            $charter->roofing_inspection_start_date = '';
            $charter->mpu_inspection_start_date = '';
            $charter->solar_inspection_start_date = '';
            $charter->pto_application_submittal_date_start = '';
            $charter->pto_application_submittal_date_end = '';
            $charter->deleted_at = time();
            $charter->updated_at = time();
            $charter->created_at = time();
            $charter->save();
        }
    }
}
