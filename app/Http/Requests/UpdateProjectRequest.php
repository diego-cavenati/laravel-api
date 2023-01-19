<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'title' => [
                'required',
                Rule::unique('projects')->ignore($this->project->id),
                'max:50'
            ],
            'cover_image' => ['nullable', 'image', 'max:300'],
            'type_id' => ['nullable', 'exists:types,id'],
            'tecnologies' => ['exist:tecnologies,id'],
            'description' => ['nullable'],
            'vote' => ['nullable', 'max:3'],
            'link' => ['nullable', 'max:100'],
        ];
    }
}
