<?php
// Command: php artisan make:request DepartmentDestroyRequest

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function authorize()
    {
        return !($this->route('department') == config('cms.default_department_id'));
    }

    public function forbiddenResponse()
    {
        return redirect()->back()->with('error-message', 'You cannot delete default department!');
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
