<?php

namespace App\Http\Requests\Auth\Role;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class DeleteRoleRequest.
 */
class DeleteRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//access()->allow('delete-role');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
