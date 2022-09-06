<?php

namespace App\Http\Requests\PmStatus;

use Illuminate\Foundation\Http\FormRequest;

class CreateStatusIssueRequest extends FormRequest
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
            'ticket_id'       => 'required',
            'pm_status_id'    => 'required',
            'issues'          => 'array',
            'issues.*.status' => 'required|in:pending,in_progress,hold,completed',
            'issues.*title'   => 'required|min:3|max:190',
            'issues.*.note'   => 'required|min:3'
        ];
    }
}
