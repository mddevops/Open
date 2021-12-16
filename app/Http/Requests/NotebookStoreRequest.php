<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotebookStoreRequest extends FormRequest
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
            'fio' => 'required|min:1',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
            'birthdate' => 'date',
            'image' => 'mimes:jpg,png,jpeg|max:2048'

        ];
    }
}
