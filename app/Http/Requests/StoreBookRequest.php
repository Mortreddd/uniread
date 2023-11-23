<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title' => 'required|filled|string',
            'description' => 'required|string|filled',
            'genreID' => 'required|filled|integer',
            'mature' => 'required|boolean',
            'copyright' => 'required|string|filled',
            'image' => 'required|image|max:255',
        ];
    }
}