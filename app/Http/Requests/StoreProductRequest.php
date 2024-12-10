<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|min:3|max:100|unique:products,name',
            'sku' => 'required|string|min:3|max:100|unique:products,sku',
            'unit_quantity' => 'required',
            'unit_value' => 'required',
            'discount' => 'required',
            'tax' => 'required',
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Product name is required',
        ];
    }
}
