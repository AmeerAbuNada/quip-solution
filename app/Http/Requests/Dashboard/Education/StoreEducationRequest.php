<?php

namespace App\Http\Requests\Dashboard\Education;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducationRequest extends FormRequest
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
            'title_en' => 'required|string|max:150',
            'title_ar' => 'required|string|max:150',
            'place_en' => 'required|string|max:150',
            'place_ar' => 'required|string|max:150',
            'place_url' => 'nullable|string|max:150',
            'duration' => 'required|string|max:150',
            'description_en' => 'required|string|max:1000',
            'description_ar' => 'required|string|max:1000',
        ];
    }
}
