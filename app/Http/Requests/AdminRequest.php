<?php

//Command:  php artisan make:request BlogRequest

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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

            
                'first_name'    => 'required',
                'last_name'     => 'required',
                'email'         => 'email|required|unique:admins',
                'password'      => 'required|confirmed',
                'department_id' => 'required',
                'role'          => 'required',
                'phone_number'  => 'required',
                'position'      => 'required',
                //'slug'          => 'required|unique:admins',
            
            
        ];

        //'image'        => 'required|mimes:jpg,jpeg,bmp,png',
        //'published_at' => 'date_format:Y-m-d H:i:s',

         switch($this->method()) {
            case 'PUT':
            case 'PATCH':
                $rules['slug'] = 'required|unique:admins,slug' . $this->route('admin.administrator');
                break;
        }

        return $rules;
    }
}
