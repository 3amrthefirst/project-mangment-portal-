<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DesignerRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:designers,email',
            'phone' => 'required|unique:designers,phone',
            'plan_price' => 'numeric',
            'structure_calculation_price' => 'numeric',
            'licenses.*.state_id' => 'numeric',
            'licenses.*.num_license' => 'string',
            'licenses.*.license_holder' => 'string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'you must enter name for developer',
            'name.string' => 'you must enter string in name developer field',
            'email.required' => 'you must enter email for developer',
            'email.email' => 'you must enter correct email',
            'email.unique' => 'this email is already taken',
            'phone.required' => 'you must enter phone number',
            'phone.unique' => 'this phone is already taken',
            'plan_price.numeric' => 'you must enter double price in plan price',
            'structure_calculation_price.numeric' => 'you must enter double price in structure calculation price',
            'licenses.*.state_id.numeric' => 'you must enter integer number in state id',
            'licenses.*.num_license.string' => 'you must enter string in number license',
            'licenses.*.license_holder.string' => 'you must enter string in license holder'
        ];
    }
}
