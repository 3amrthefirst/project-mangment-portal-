<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeterSpotUpdateRequest extends FormRequest
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
            'project_id' => 'numeric',
            'is_mpu' => 'boolean',
            'status' => 'in:portal,in person,already have',
        ];
    }

    public function messages()
    {
        return [
            'project_id.numeric' => 'you must send number in project id',
            'status.in' => 'you must choose available value ',
        ];
    }
}
