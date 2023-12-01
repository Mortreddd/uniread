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
            'description' => 'required|string|filled|max:255',
            'genreID' => 'required|filled|integer',
            'copyright' => 'required|string|filled',
            'image' => 'required|image|max:10240|mimes:png,jpg,jpeg,bmp,tiff',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'title.filled' => 'Title is required',
            'description.required' => 'Description is required',
            'description.filled' => 'Decription is required',
            'genreID.filled' => 'Please choose Genre is required',
            'genreID.required' => 'Genre is required',
            'copyright.required' => 'Please choose a copyright',
            'image.image' => 'Only images are applicable to submit',
            'image.required' => 'Cover of the book is required',
            'image.max' => 'Cover of the book must not exceed 10MB',
            'image.mimes' => 'Cover of the book must be in png, jpg, jpeg, bmp, tiff format'
        ];
    }
}