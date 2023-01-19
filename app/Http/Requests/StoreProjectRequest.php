<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required|unique:projects,title|max:50',
            'cover_image' => 'nullable|image|max:250',
            'type_id' => 'nullable|exists:types,id',
            'tecnologies' => 'exists:tecnologies,id',
            'description' => 'nullable',
            'vote' => 'nullable|max:3',
            'link' => 'nullable|max:100',
        ];
    }
}
