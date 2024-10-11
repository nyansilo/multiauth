<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'email|required|unique:admins,email,' . $this->route("admin"),
            'password'      => 'required_with:password_confirmation|confirmed',
            'role'          => 'required',
            'department_id' => 'required',
            'slug'          => 'required|unique:admins,slug,' . $this->route("admin"),
        ];
    }
    //'email'    => 'email|required|unique:admins,email,' . $this->route("admin"),
}
