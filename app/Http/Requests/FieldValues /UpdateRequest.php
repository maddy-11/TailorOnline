<?php

namespace App\Http\Requests\FieldValues;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'field_id'     => ['required'],
            'option_value' => 'required'
        ];
    }
    /**
     * Show the Messages for rules above.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'field_id.required'     => 'Field name is required.',
            'option_value.required' => 'Field value is required.'
        ];
    }
}
