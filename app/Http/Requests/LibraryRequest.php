<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibraryRequest extends FormRequest
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
            'authorID' => 'required|integer',
            'bookID' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'success' => 'Book is successfully added to library',
            'error' => 'Book has not been added to library'
        ];
    }
}