<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateChapterRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'book_id' => 'required|integer|exists:books,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required!',
            'content.required' => 'Content is required!',
            'title.max' => 'Title is too long!'
        ];
    }
}