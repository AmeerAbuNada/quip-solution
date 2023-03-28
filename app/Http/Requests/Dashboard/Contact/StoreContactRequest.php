<?php

namespace App\Http\Requests\Dashboard\Contact;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;

class StoreContactRequest extends FormRequest
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
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:180',
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
                'first_name.required' => 'The first name field is required.',
                'first_name.string' => 'The first name field have to be a string.',
                'first_name.max' => 'The first name must be less thean 50 characters',

                'last_name.required' => 'The last name field is required.',
                'last_name.string' => 'The last name field have to be a string.',
                'last_name.max' => 'The last name must be less thean 50 characters',

                'email.required' => 'The email field is required.',
                'email.email' => 'The email field have to be a valid email.',
                'email.max' => 'The email must be less thean 180 characters',

                'message.required' => 'The message field is required.',
                'message.string' => 'The message field have to be a string.',
                'message.max' => 'The message must be less thean 8000 characters',
            ];
        }

        return [
            'first_name.required' => 'يرجى إدخال الإسم الأول',
            'first_name.string' => 'الإسم الأول يجب أن يكون نص',
            'first_name.max' => 'الإسم الأول يجب أن يكون أقل من 50 حرف',

            'last_name.required' => 'يرجى إدخال إسم العائلة',
            'last_name.string' => 'إسم العائلة يجب أن يكون نص',
            'last_name.max' => 'إسم العائلة يجب أن يكون أقل من 50 حرف',

            'email.required' => 'يرجى إدخال البريد الإلكتروني',
            'email.email' => 'يرجى إدخال بريد إلكتروني صحيح',
            'email.max' => 'البريد الإلكتروني يجب الا يزيد عن 180 حرف',

            'message.required' => 'يرجى إدخال نص الرسالة',
            'message.string' => 'نص الرسالة يجب أن تكون نص',
            'message.max' => 'نص الرسالة يجب أن تكون أقل من 8000 حرف',
        ];
    }
}
