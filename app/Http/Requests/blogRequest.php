<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class blogRequest extends FormRequest
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
            'title' => 'required',
            'category' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'new_image' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Blog Title',
            'category' => 'Blog Category',
            'tags' => 'Blog Tags',
            'description' => 'Blog Description',
            'new_image' => 'Blog Image',
        ];
    }
}
