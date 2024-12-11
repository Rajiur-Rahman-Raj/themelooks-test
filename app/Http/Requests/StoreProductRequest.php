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
        return [
            'name' => 'required|string|min:3|max:100',
            'sku' => 'required|string|alpha_dash|min:3|max:100|unique:products,sku',
            'unit_quantity' => 'required|numeric|min:1',
            'unit_value' => 'required|string|min:1|max:100',
            'purchase_price' => 'required|numeric|min:1',
            'selling_price' => 'required|string|min:1',
            'discount' => 'nullable|numeric|min:0|max:100',
            'tax' => 'nullable|numeric|min:0|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Product name is required.',
            'name.string' => 'Product name must be a string.',
            'name.min' => 'Product name must be at least 3 characters.',
            'name.max' => 'Product name cannot exceed 100 characters.',
            'name.unique' => 'This product name already exists. Please use a different name.',
            'sku.required' => 'SKU is required.',
            'sku.string' => 'SKU must be a string.',
            'sku.alpha_dash' => 'SKU can only contain letters, numbers, dashes, and underscores.',
            'sku.min' => 'SKU must be at least 3 characters.',
            'sku.max' => 'SKU cannot exceed 100 characters.',
            'sku.unique' => 'This SKU already exists. Please use a different SKU.',

            'unit_quantity.required' => 'Unit quantity is required.',
            'unit_quantity.numeric' => 'Unit quantity must be a number.',
            'unit_quantity.min' => 'Unit quantity must be at least 1.',

            'unit_value.required' => 'Unit value is required.',
            'unit_value.min' => 'Unit value must be at least 1 characters.',

            'purchase_price.required' => 'Purchase price is required.',
            'purchase_price.numeric' => 'Purchase price must be a number.',
            'purchase_price.min' => 'Purchase price must be at least 1.',

            'selling_price.required' => 'Selling price is required.',
            'selling_price.numeric' => 'Selling price must be a number.',
            'selling_price.min' => 'Selling price must be at least 1.',

            'discount.numeric' => 'Discount must be a number.',
            'discount.min' => 'Discount cannot be less than 0.',
            'discount.max' => 'Discount cannot exceed 100%.',

            'tax.required' => 'Tax is required.',
            'tax.numeric' => 'Tax must be a number.',
            'tax.min' => 'Tax cannot be less than 0.',
            'tax.max' => 'Tax cannot exceed 100%.',

            'image.image' => 'Uploaded file must be an image.',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'Image size cannot exceed 5MB.',
        ];
    }

}
