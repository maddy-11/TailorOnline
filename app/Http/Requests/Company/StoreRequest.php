<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'email'      => ['required', 'max:191', 'unique:companies'],
            'phone'      => 'required|string',
            'password'      => 'required|string'
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
            'phone.required' => 'Phone field is required.',
            'password.required' => 'Password field is required.',
        ];
    }
}
