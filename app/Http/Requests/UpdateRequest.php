<?php

namespace App\Http\Requests\Suppliers;

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
            'email'      => ['required', 'max:191', 'unique:suppliers'],
            'password'   => 'required|string',
            'phone'      => 'required|string'
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
            'email.required' => 'Email field is required.',
            'email.unique'   => 'Email already exist', 
            'password.required' => 'Password field is required.',
            'phone.required' => 'Phone field is required.',
        ];
    }
}
