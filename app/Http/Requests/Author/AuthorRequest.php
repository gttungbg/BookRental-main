<?php

namespace App\Http\Requests\Author;

use Illuminate\Foundation\Http\FormRequest;


class AuthorRequest extends FormRequest
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
            'name' => 'required|unique:authors|min:10|max:255',
            'date_of_birth' => 'required',
        ];
    }
}
