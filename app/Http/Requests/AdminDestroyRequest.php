<?php


//Command:  php artisan make:request AdminDestroyRequest

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminDestroyRequest extends FormRequest
{
    /**
     * Determine if the admin is authorized to make this request.
     *
     * @return bool
     */
     public function authorize()
     {
         return !($this->route('admin') == config('cms.default_admin_id') ||
                    $this->route('admin') == auth()->user()->id);
     }

     public function forbiddenResponse()
     {
         return redirect()->back()->with('error-message', 'You cannot delete default admin or delete yourself!');
     }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
