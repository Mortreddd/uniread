<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class EditPasswordRequest extends FormRequest
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
            'password' => 'required|confirmed|string|min:8|filled'
        ];
    }


    public function messages()
    {
        return [
            'password.required' => 'Password is required',
            'password.confirmed' => 'Password does not match',
            'password.min' => 'Password must atlease 8 characters'
        ];
    }
}