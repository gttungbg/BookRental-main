<?php

namespace App\Http\Requests\Publishers;

use Illuminate\Foundation\Http\FormRequest;

class CreatePublisherRequest extends FormRequest
{
    // public function authorize()
    // {
    //     return true;
    // }
    public function rules()
    {
        return [
            'name' => 'required|Unique:publishers|max:255',
            'description' => 'required',
        ];
    }
}
