<?php

namespace App\Http\Requests\Dashboard\Portfolio;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePortfolioRequest extends FormRequest
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
            'image' => 'nullable|image',
            'name_en' => 'required|string|max:150',
            'name_ar' => 'required|string|max:150',
            'category_id' => 'nullable|integer|exists:categories,id',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'tags' => 'required|string|max:2000',
            'url' => 'required|string|max:2000',
            'images_length' => 'required|integer|min:0',
            'descriptions' => 'required|array',
        ];
    }
}
