<?php

namespace App\Http\Requests\Charter;

use Illuminate\Foundation\Http\FormRequest;

class CharterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "ticket_id"                                 => 'required|exists:tickets,id',
            "project_name"                              => "required",
            "project_manager"                           => "",
            "project_address"                           => "",
            "project_system_size"                       => "",
            "project_installation_type"                 => "",
            "project_additional_permits"                => "",
            "project_roofer"                            => "",
            "project_designer"                          => "",
            "jurisdiction"                              => "required",
            "jurisdiction_contact_email"                => "required",
            "jurisdiction_contact_mobile"               => "required",
            "submittal_process"                         => "required|in:inperson,email,portal,postmail",
            "jurisdiction_estimated_duration"           => "required|integer",
            "utility_company"                           => "",
            "utility_pto_process"                       => "required|in:inperson,email,portal,postmail",
            "utility_contact_email"                     => "required",
            "utility_contact_mobile"                    => "required",
            "utility_estimated_duration"                => "required|integer",
            "roofing_contract_redecking"                => "",
            "roofing_shingles"                          => "",
            "mpu_meter_spot"                            => "",
            "mpu_shutoff_required"                      => "",
            "project_valuation"                         => "",
            "products_manufacturer"                     => "",
            "inverter_manufacturer_model"               => "",
            "products_total_price"                      => "required",
            "welcome_call"                              => "date_format:Y-m-d H:i:s",
            "site_survey"                               => "date_format:Y-m-d H:i:s",
            "meterspot_date"                            => "date_format:Y-m-d H:i:s",
            "mpu_application_submission_date_start"     => "date_format:Y-m-d H:i:s",
            "mpu_permit_issuance_date_end"              => "date_format:Y-m-d H:i:s",
            "solar_application_submission_date_start"   => "date_format:Y-m-d H:i:s",
            "solar_permit_issuance_date_end"            => "date_format:Y-m-d H:i:s",
            "roofing_application_submission_date_start" => "date_format:Y-m-d H:i:s",
            "roofing_permit_issuance_date_end"          => "date_format:Y-m-d H:i:s",
            "roofing_installation_start_time"           => "date_format:Y-m-d H:i:s",
            "roofing_installation_complete"             => "date_format:Y-m-d H:i:s",
            "mpu_installation_start_time"               => "date_format:Y-m-d H:i:s",
            "mpu_installation_complete"                 => "date_format:Y-m-d H:i:s",
            "solar_installation_start_time"             => "date_format:Y-m-d H:i:s",
            "solar_installation_complete"               => "date_format:Y-m-d H:i:s",
            "roofing_inspection_start_date"             => "date_format:Y-m-d H:i:s",
            "mpu_inspection_start_date"                 => "date_format:Y-m-d H:i:s",
            "solar_inspection_start_date"               => "date_format:Y-m-d H:i:s",
            "pto_application_submittal_date_start"      => "date_format:Y-m-d H:i:s",
            "pto_application_submittal_date_end"        => "date_format:Y-m-d H:i:s",
            "updated_at"                                => "date_format:Y-m-d H:i:s",
            "created_at"                                => "date_format:Y-m-d H:i:s",
            "deleted_at"                                => "date_format:Y-m-d H:i:s",

        ];
    }
}
