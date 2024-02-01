<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddPeopleTeam extends FormRequest
{
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
            'member' => ['required','array'],
            'member.*' => [
                'required',
                'integer',
                Rule::exists('users', 'id')->whereNotIn('id', function ($query) {
                    // Query to check if the user ID is already associated with the team
                    $query->select('user_id')->from('team_users')->where('team_id', $this->team->id);
                }),
            ],
        ];
    }
}
