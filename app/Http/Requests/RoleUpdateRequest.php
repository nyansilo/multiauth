<?php
// Command: php artisan make:request RoleUpdateRequest 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
         return [
            //'name' => 'required|max:255|unique:roles,name,' . $this->route('admin.admin_role'),
            //'slug'  => 'required|max:255|unique:roles,slug,' . $this->route('admin.admin_role'),
        ];
    }
}
