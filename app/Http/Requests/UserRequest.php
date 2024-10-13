<?php

//Command:  php artisan make:request BlogRequest

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'first_name'        => 'required',
            'last_name'         => 'required',
            'email'             => 'email|required|unique:users',
            'password'          => 'required|confirmed',
            'phone_number'      => 'required',
            'position'         => 'required',
            'department_id'     => 'required',
            
        ];

        //'image'        => 'required|mimes:jpg,jpeg,bmp,png',
        //'published_at' => 'date_format:Y-m-d H:i:s',

         switch($this->method()) {
            case 'PUT':
            case 'PATCH':
                $rules['slug'] = 'required|unique:users,slug' . $this->route('admin.user');
                break;
        }

        return $rules;
    }
}
