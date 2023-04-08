<?php

namespace App\Http\Requests\Dashboard\Feature;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeatureRequest extends FormRequest
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
            'title_en' => 'required|string|max:180',
            'title_ar' => 'required|string|max:180',
            'is_active' => 'required|boolean',
            'description_en' => 'required|string|max:1000',
            'description_ar' => 'required|string|max:1000',
        ];
    }
}
