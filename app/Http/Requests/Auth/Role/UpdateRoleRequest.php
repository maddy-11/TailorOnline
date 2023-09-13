<?php

namespace App\Http\Requests\Auth\Role;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateRoleRequest.
 */
class UpdateRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;// access()->allow('edit-role');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $permissions = '';

        if ($this->associated_permissions != 'all') {
            $permissions = 'required';
        }

        return [
            'name' => 'required|max:191|unique:roles,name,'.$this->segment(4),
            'permissions' => $permissions,
        ];
    }

    public function messages()
    {
        return [
            'permissions.required' => 'You must select at least one permission for this role.',
        ];
    }
}
