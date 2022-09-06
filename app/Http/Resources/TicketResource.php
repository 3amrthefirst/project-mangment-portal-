<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                    => $this->id,
            'user_id'               => $this->user_id,
            'lead_id'               => $this->lead_id,
            'opportunity_id'        => $this->opportunity_id,
            'lead_date'             => $this->lead_date,
            'client_name'           => $this->client_name,
            'client_phone'          => $this->client_phone,
            'client_email'          => $this->client_email,
            'client_address'        => $this->client_address,
            'contract_id'           => $this->contract_id,
            'status'                => $this->status,
            'project_status'        => $this->project_status,
            'pm_status'             => $this->pm_status,
            'financial_status'      => $this->financial_status,
            'project_custom_status' => $this->project_custom_status,
            'user'                  => $this->whenLoaded('user')
        ];
    }
}
