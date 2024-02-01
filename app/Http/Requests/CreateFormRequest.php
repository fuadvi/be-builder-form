<?php

namespace App\Http\Requests;

use App\Http\Traits\ErrorForm;
use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
{
    use ErrorForm;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','string'],
            'description' => ['required','string'],
            'background' => ['nullable', 'image'],
            'team_id' => ['required','integer','exists:teams,id']
        ];
    }
}
