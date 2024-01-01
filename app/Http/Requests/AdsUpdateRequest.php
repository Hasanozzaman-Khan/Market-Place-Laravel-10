<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdsUpdateRequest extends FormRequest
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
            'name' => 'required|min:3|max:60',
            'description' => 'required|min:3',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
            'price_status' => 'required',
            'category_id' => 'required',
            'product_condition' => 'required',
            'country_id' => 'required',
            'phone_number' => 'numeric|min:11'
        ];
    }
}
