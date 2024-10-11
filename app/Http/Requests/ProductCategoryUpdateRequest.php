<?php
// Command: php artisan make:request BlogCategoryUpdateRequest 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryUpdateRequest extends FormRequest
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
            'name' => 'required|max:255|unique:product_categories,name,' . $this->route('admin.category'),
            'slug'  => 'required|max:255|unique:product_categories,slug,' . $this->route('admin.category'),
        ];
    }
}
