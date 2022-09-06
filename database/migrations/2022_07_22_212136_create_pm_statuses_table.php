<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePmStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pm_statuses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('ticket_id');
            $table->enum('welcome_call', [1,2,3,4,5])->default(1);
            $table->enum('welcome_package', [1,2,3,4,5])->default(1);
            $table->enum('create_charter', [1,2,3,4,5])->default(1);
            $table->enum('business_license', [1,2,3,4,5])->default(1);
            $table->enum('apply_meter_spot', [1,2,3,4,5])->default(1);
            $table->enum('check_product_availability', [1,2,3,4,5])->default(1);
            $table->enum('request_to_designer', [1,2,3,4,5])->default(1);
            $table->enum('plans_received', [1,2,3,4,5])->default(1);
            $table->enum('send_plan_to_client', [1,2,3,4,5])->default(1);
            $table->enum('apply_all_required_permits', [1,2,3,4,5])->default(1);
            $table->enum('apply_pto', [1,2,3,4,5])->default(1);
            $table->enum('products_quotes', [1,2,3,4,5])->default(1);
            $table->enum('ntp_finance_portal', [1,2,3,4,5])->default(1);
            $table->enum('upload_permit_to_finance', [1,2,3,4,5])->default(1);
            $table->enum('order_placards', [1,2,3,4,5])->default(1);
            $table->enum('coordinate_product_delivery', [1,2,3,4,5])->default(1);
            $table->enum('coordinate_client_installer_installation', [1,2,3,4,5])->default(1);
            $table->enum('order_product', [1,2,3,4,5])->default(1);
            $table->enum('order_installer_approval', [1,2,3,4,5])->default(1);
            $table->enum('documents_to_installer', [1,2,3,4,5])->default(1);
            $table->enum('schedule_inspection', [1,2,3,4,5])->default(1);
            $table->enum('permit_collection', [1,2,3,4,5])->default(1);
            $table->enum('installer_on_the_way', [1,2,3,4,5])->default(1);
            $table->enum('installer_commissions', [1,2,3,4,5])->default(1);
            $table->enum('upload_installation_pics_to_finance', [1,2,3,4,5])->default(1);
            $table->enum('monitoring_optimizer', [1,2,3,4,5])->default(1);
            $table->enum('installer_checkout', [1,2,3,4,5])->default(1);
            $table->enum('payment_collection', [1,2,3,4,5])->default(1);
            $table->enum('resend_document_to_installer', [1,2,3,4,5])->default(1);
            $table->enum('confirm_installer_inspection', [1,2,3,4,5])->default(1);
            $table->enum('confirm_city_office_time_frame', [1,2,3,4,5])->default(1);
            $table->enum('invoice_for_installer', [1,2,3,4,5])->default(1);
            $table->enum('final_job_card', [1,2,3,4,5])->default(1);
            $table->enum('inform_inspection_result', [1,2,3,4,5])->default(1);
            $table->enum('confirm_inspection_result', [1,2,3,4,5])->default(1);
            $table->enum('upload_to_pto', [1,2,3,4,5])->default(1);
            $table->enum('pto_to_finance', [1,2,3,4,5])->default(1);
            $table->enum('inform_pto_client', [1,2,3,4,5])->default(1);
            $table->enum('inform_pto_team_members', [1,2,3,4,5])->default(1);
            $table->enum('closure_report', [1,2,3,4,5])->default(1);
            $table->enum('review_profit_loss_statement', [1,2,3,4,5])->default(1);
            $table->enum('send_full_details_to_client', [1,2,3,4,5])->default(1);
            $table->enum('end_project_call', [1,2,3,4,5])->default(1);
            $table->enum('finished', [1,2,3,4,5])->default(1);

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
        Schema::dropIfExists('pm_statuses');
    }
}
