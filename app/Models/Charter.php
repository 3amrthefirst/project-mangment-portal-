<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Charter extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ticket_id',
        'project_name',
        'project_manager',
        'project_address',
        'project_system_size',
        'project_installation_type',
        'project_additional_permits',
        'project_roofer',
        'project_designer',
        'jurisdiction',
        'jurisdiction_contact_email',
        'jurisdiction_contact_mobile',
        'submittal_process',
        'jurisdiction_estimated_duration',
        'utility_company',
        'utility_pto_process',
        'utility_contact_email',
        'utility_contact_mobile',
        'utility_estimated_duration',
        'roofing_contract_redecking',
        'roofing_shingles',
        'mpu_meter_spot',
        'mpu_shutoff_required',
        'project_valuation',
        'products_manufacturer',
        'inverter_manufacturer_model',
        'products_total_price',
        'welcome_call',
        'site_survey',
        'meterspot_date',
        'mpu_application_submission_date_start',
        'mpu_permit_issuance_date_end',
        'solar_application_submission_date_start',
        'solar_permit_issuance_date_end',
        'roofing_application_submission_date_start',
        'roofing_permit_issuance_date_end',
        'roofing_installation_start_time',
        'roofing_installation_complete',
        'mpu_installation_start_time',
        'mpu_installation_complete',
        'solar_installation_start_time',
        'solar_installation_complete',
        'roofing_inspection_start_date',
        'mpu_inspection_start_date',
        'solar_inspection_start_date',
        'pto_application_submittal_date_start',
        'pto_application_submittal_date_end'
    ];

    public function BusinessLicense()
    {
        return $this->hasOne('App\Models\BusinessLicense', 'project_id', 'id');
    }

    public function MeterSpot()
    {
        return $this->hasOne('App\Models\MeterSpot', 'project_id', 'id');
    }
}
