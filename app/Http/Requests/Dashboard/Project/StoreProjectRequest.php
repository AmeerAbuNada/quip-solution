<?php

namespace App\Http\Requests\Dashboard\Project;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title_en' => 'required|string|max:150',
            'title_ar' => 'required|string|max:150',
            'is_active' => 'required|string|in:true,false',
            'description_en' => 'required|string|max:1000',
            'description_ar' => 'required|string|max:1000',
        ];
    }
}
