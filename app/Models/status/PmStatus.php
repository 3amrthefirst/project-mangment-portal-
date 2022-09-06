<?php

namespace App\Models\status;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'welcome_call',
        'welcome_package',
        'create_charter',
        'business_license',
        'apply_meter_spot',
        'check_product_availability',
        'request_to_designer',
        'plans_received',
        'send_plan_to_client',
        'apply_all_required_permits',
        'apply_pto',
        'products_quotes',
        'ntp_finance_portal',
        'upload_permit_to_finance',
        'order_placards',
        'coordinate_product_delivery',
        'coordinate_client_installer_installation',
        'order_product',
        'order_installer_approval',
        'documents_to_installer',
        'schedule_inspection',
        'permit_collection',
        'installer_on_the_way',
        'installer_commissions',
        'upload_installation_pics_to_finance',
        'monitoring_optimizer',
        'installer_checkout',
        'payment_collection',
        'resend_document_to_installer',
        'confirm_installer_inspection',
        'confirm_city_office_time_frame',
        'invoice_for_installer',
        'final_job_card',
        'inform_inspection_result',
        'confirm_inspection_result',
        'upload_to_pto',
        'pto_to_finance',
        'inform_pto_client',
        'inform_pto_team_members',
        'closure_report',
        'review_profit_loss_statement',
        'send_full_details_to_client',
        'end_project_call',
        'finished'
    ];

    protected function getArrayableAttributes()
    {

        foreach ($this->attributes as $key => $value) {
            if ($key == 'deleted_at') continue;

            if (is_null($value)) {
                $this->attributes[$key] = '';
            }
        }

        return $this->getArrayableItems($this->attributes);
    }
}
