<?php

namespace App\Http\Requests\Dashboard\Pricing;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePricingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'icon' => 'required|string|max:150',
            'title_en' => 'required|string|max:150',
            'title_ar' => 'required|string|max:150',
            'description_en' => 'required|string|max:150',
            'description_ar' => 'required|string|max:150',
            'price' => 'required|numeric',
            'list_en' => 'required|string|max:1000',
            'list_ar' => 'required|string|max:1000',
        ];
    }
}
