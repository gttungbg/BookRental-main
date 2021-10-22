<?php

namespace App\Http\Requests\Books;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'isbn' => 'required|max:255',
            'categories.category_id' => 'required',
            'publishers.publisher_id' => 'required',
            'title' => 'required|min:5|max:255',
            'slug' => 'required|min:5',
            'contents' => 'required|min:5',
            'size' => 'required|min:2',
            'numOfPage' => 'required|min:5',
            'quantity' => 'required|min:5',
            'publish_date' => 'required|min:5',
            'price' => 'required|min:5',
            'view_count' => 'required|min:5',
            'feature_image_path' => 'required',

        ];
    }
}
