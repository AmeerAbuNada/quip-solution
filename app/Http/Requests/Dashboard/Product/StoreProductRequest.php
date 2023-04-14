<?php

namespace App\Http\Requests\Dashboard\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

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
            'image' => 'required|image',
            'name_en' => 'required|string|max:150',
            'name_ar' => 'required|string|max:150',
            'sub_category_id' => 'required|integer|exists:sub_categories,id',
            'catalog' => 'required|file',
            'video_link' => 'required|url|max:2048',
            'is_active' => 'required|string|in:true,false',
            'is_best_selling' => 'required|string|in:true,false',
            'images' => 'nullable|array',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'features_en' => 'required|string',
            'features_ar' => 'required|string',
        ];
    }
}
