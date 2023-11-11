<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAuthorRequest extends FormRequest
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
            'username' => 'required|min:4|unique:authors',
            'email'=> 'required|email|unique:authors',
            'password' => 'required|min:8'
        ];
    }

    public function messages()
    {
        return [
            'error' => 'Cannot use this credentials',
            'password' => 'Password must be at least 8 characters long',
            'username' => 'Username must be at least 4 characters long'
        ];
    }
}