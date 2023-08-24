<?php

namespace App\Http\Requests\Fields;

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
            'label'      => ['required', 'max:191'],
            'field_type' => 'required'
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
            'label.required' => 'Field Label is required.',
            'field_type.required'   => 'Field type is required.'
        ];
    }
}
