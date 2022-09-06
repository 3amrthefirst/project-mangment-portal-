<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WelcomeCallResource extends JsonResource
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
            'id'               => $this->id,
            'any_locked_gates' => $this->any_locked_gates,
            'any_dogs'         => $this->any_dogs,
            'any_unpermitted'  => $this->any_unpermitted,
            'status'           => $this->status,
            'comment'          => $this->comment,
            'user_id'          => $this->user->id,
            'user_name'        => $this->user->name
        ];
    }
}
