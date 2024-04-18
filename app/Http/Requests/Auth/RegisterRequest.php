<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|confirmed|string',
            'address' => 'required|string',
            'phone' => 'required',
            'dob' => 'required',
            'nid' => 'required',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return string[]
     */
    public function messages()
    {
        return [
            'dob.required' => 'The date of birth field is required.',
            'nid.required' => 'The ID verification field is required.',
        ];
    }
}
