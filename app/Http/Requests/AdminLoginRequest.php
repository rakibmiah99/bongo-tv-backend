<?php

namespace App\Http\Requests;

use App\Enums\UserType;
use App\Traits\ValidationRequestHandle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AdminLoginRequest extends FormRequest
{
    use ValidationRequestHandle;

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
            'email' => [
                'required',
                Rule::exists('users')->where('type', UserType::Admin->value)
            ],
            'password' => [
                'required',
                Password::min(6),
            ]
        ];
    }
}
