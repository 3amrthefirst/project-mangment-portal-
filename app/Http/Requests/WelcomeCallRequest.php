<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WelcomeCallRequest extends FormRequest
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
            'ticket_id'        => 'required|exists:tickets,id',
            'any_locked_gates' => 'required|numeric',
            'any_dogs'         => 'required|numeric',
            'any_unpermitted'  => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'any_locked_gates.required' => 'you must choose any locked gates or not',
            'any_locked_gates.numeric'  => 'you must send number in any locked gates',
            'any_dogs.required'         => 'you must choose any dogs or not',
            'any_dogs.numeric'          => 'you must send number in any dogs',
            'any_unpermitted.required'  => 'you must choose any unpermitted or not',
            'any_unpermitted.numeric'   => 'you must send number in any unpermitted',
        ];
    }
}
