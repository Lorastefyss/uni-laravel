<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Assuming all authenticated users can manage users
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $userId = $this->user ? $this->user->id : null;
        
        $rules = [];
        $rules['name'] = ['required', 'string', 'max:255'];
        $rules['email'] = ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($userId)];

        if ($this->isMethod('put')) {
            $rules['password'] = ['nullable', 'string', 'min:8', 'confirmed'];
        } else {
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
        }
    
        return $rules;
    }
}
