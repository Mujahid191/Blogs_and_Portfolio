<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class portfolioRequest extends FormRequest
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
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_description' => 'required',
            'portfolio_image' => 'required|image|mimes:jpeg,png,jpg',
        ];
    }

    public function attributes()
    {
        return [
            'portfolio_name' => 'Portfolio Name',
            'portfolio_title' => 'Portfolio Title',
            'portfolio_description' => 'Portfolio Description',
            'portfolio_image' => 'Portfolio Image',
        ];
    }
}
