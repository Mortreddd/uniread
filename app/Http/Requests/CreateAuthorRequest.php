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
            'fullname' => 'required|filled|string|regex:/^[a-zA-Z\s]+$/u',
            'username' => 'required|min:4|unique:authors,username',
            'birthday' => 'required|filled|date',
            'gender' => 'required|filled|in:Male,Female',
            'email'=> 'required|email|unique:authors,email',
            'password' => 'required|min:8'
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'The fullname field is required.',
            'fullname.filled' => 'The fullname field must not be empty.',
            'fullname.string' => 'The fullname field must be a string.',
            'fullname.regex' => 'The fullname field must only contain letters and spaces.',
            
            'username.required' => 'The username field is required.',
            'username.min' => 'Username must be at least 4 characters long.',
            'username.unique' => 'The username has already been taken.',
            
            'birthday.required' => 'The birthday field is required.',
            'birthday.filled' => 'The birthday field must not be empty.',
            'birthday.date' => 'The birthday field must be a valid date.',
            
            'gender.required' => 'The gender field is required.',
            'gender.filled' => 'The gender field must not be empty.',
            'gender.in' => 'The selected gender is invalid.',
            
            'email.required' => 'The email field is required.',
            'email.email' => 'Email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            
            'password.required' => 'The password field is required.',
            'password.min' => 'Password must be at least 8 characters long.',
        ];
    }
}