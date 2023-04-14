<?php

namespace App\Http\Requests\Dashboard\SubCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubCategoryRequest extends FormRequest
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
            'name_en' => 'required|string|max:150',
            'name_ar' => 'required|string|max:150',
            'category_id' => 'required|integer|exists:categories,id',
        ];
    }
}
