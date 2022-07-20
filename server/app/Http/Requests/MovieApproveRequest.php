<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieApproveRequest extends FormRequest
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
            'movieId' => 'required|int',
            'decision' => 'required|bool|min:1|max:4'
        ];
    }
}
