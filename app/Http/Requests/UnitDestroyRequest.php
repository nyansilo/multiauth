<?php
// Command: php artisan make:request UnitDestroyRequest

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function authorize()
    {
        return !($this->route('unit') == config('cms.default_unit_id'));
    }

    public function forbiddenResponse()
    {
        return redirect()->back()->with('error-message', 'You cannot delete default unit!');
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