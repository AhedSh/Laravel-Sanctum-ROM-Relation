<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => 'required',
            'name' => 'required|integer|max:12',
            'size' => 'required',
            'price' => 'required',
        ];
    }



    public function messages()
{
    return [
        'name.required' => 'The name field is required.',
        'name.max' => 'The name field must not exceed 12 characters.',
    ];
}
}
