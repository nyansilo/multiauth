<?php

//Command:  php artisan make:request BlogRequest

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'         => 'required',
            'slug'         => 'required|unique:products',
            'quantity'     => 'required',
            'unit_id'      => 'required',
            'description'  => 'required',
            'category_id'  => 'required',
            'image'        => 'required|mimes:jpg,jpeg,bmp,png',
        ];

        //'published_at' => 'date_format:Y-m-d H:i:s',

         switch($this->method()) {
            case 'PUT':
            case 'PATCH':
                $rules['slug'] = 'required|unique:products,slug,' . $this->route('admin.product');
                break;
        }

        return $rules;
    }
}
