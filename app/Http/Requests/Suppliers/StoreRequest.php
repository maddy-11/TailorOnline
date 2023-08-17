<?php

namespace App\Http\Requests\Suppliers;

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
            'bran_name'=> ['required', 'max:191'], 
            'full_business_name'=> ['required', 'max:191'], 
            'email'      => ['required', 'max:191', 'unique:suppliers'], 
            'contact_person_phone'      => 'required|string'
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
            'bran_name.required' => 'Bran name field is required.',
            'full_business_name.required' => 'Full business name field is required.',
            'email.required' => 'Email field is required.',
            'email.unique'   => 'Email already exist',  
            'contact_person_phone.required' => 'Phone field is required.',
        ];
    }
}
