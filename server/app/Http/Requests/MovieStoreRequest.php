<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieStoreRequest extends FormRequest
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
                'title' => 'required|unique:movies|max:120',
                'description' => 'required|max:1000',
                'link' => 'string',
                'genres' => 'required|array|min:1|',
                'author_id' => 'required',
        ];
    }
}
