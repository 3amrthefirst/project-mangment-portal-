<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeterSpotRequest extends FormRequest
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
            'project_id' => 'required|numeric',
            'is_mpu' => 'required|boolean',
            'status' => 'required|in:portal,in person,already have',
        ];
    }

    public function messages()
    {
        return [
            'project_id.required' => 'you must put the project id',
            'project_id.numeric' => 'you must send number in project id',
            'is_mpu.required' => 'you must choose true or false',
            'status.required' => 'you must choose any value',
            'status.in' => 'you must choose available value ',
        ];
    }
}
