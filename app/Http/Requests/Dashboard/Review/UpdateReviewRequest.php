<?php

namespace App\Http\Requests\Dashboard\Review;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
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
            'content_en' => 'required|string|max:1000',
            'content_ar' => 'required|string|max:1000',
            'job_title_en' => 'required|string|max:150',
            'job_title_ar' => 'required|string|max:150',
        ];
    }
}
