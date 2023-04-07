<?php

namespace App\Http\Requests\Landing;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;

class StoreContactRequest extends FormRequest
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
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:320',
            'message' => 'required|string|max:8000',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        if (App::isLocale('en')) {
            return [
                'name.required' => 'The first name field is required.',
                'name.string' => 'The first name field have to be a string.',
                'name.max' => 'The first name must be less than 150 characters',

                'email.required' => 'The email field is required.',
                'email.email' => 'The email field have to be a valid email.',
                'email.max' => 'The email must be less than 320 characters',

                'message.required' => 'The message field is required.',
                'message.string' => 'The message field have to be a string.',
                'message.max' => 'The message must be less than 8000 characters',
            ];
        }

        return [
            'name.required' => 'يرجى إدخال الإسم',
            'name.string' => 'الإسم يجب أن يكون نص',
            'name.max' => 'الإسم يجب أن يكون أقل من 150 حرف',

            'email.required' => 'يرجى إدخال البريد الإلكتروني',
            'email.email' => 'يرجى إدخال بريد إلكتروني صحيح',
            'email.max' => 'البريد الإلكتروني يجب الا يزيد عن 320 حرف',

            'message.required' => 'يرجى إدخال نص الرسالة',
            'message.string' => 'نص الرسالة يجب أن تكون نص',
            'message.max' => 'نص الرسالة يجب أن تكون أقل من 8000 حرف',
        ];
    }
}
