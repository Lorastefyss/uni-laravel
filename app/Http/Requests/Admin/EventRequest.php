<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:1'],
            'year' => ['required', 'integer', 'min:1970'],
            'type' => ['required', 'string', 'min:1'],
            'files.*' => 'nullable|file|mimes:jpg,jpeg,png|max:10240',
        ];
    }
}
