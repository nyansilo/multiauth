<?php
// Command: php artisan make:request BlogCategoryUpdateRequest 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitUpdateRequest extends FormRequest
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
            'name' => 'required|max:255|unique:units,name,' . $this->route('admin.unit'),
            'slug'  => 'required|max:255|unique:units,slug,' . $this->route('admin.unit'),
        ];
    }
}
