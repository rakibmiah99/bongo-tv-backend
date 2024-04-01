<?php

namespace App\Http\Requests;

use App\Enums\LoginOptions;
use App\Enums\UserType;
use App\Traits\ValidationRequestHandle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class SubscriberLoginRequest extends FormRequest
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
        $this->request->set('login_option', $this->login_option);
        $this->query->set('login_option', $this->login_option);
        return [
            // Apply required and conditional fields validation
            'login_option' => [
                'required',
                Rule::enum(LoginOptions::class)
            ],
            'phone' => 'required_if:login_option,mobile',
            'email' => [
                'required_if:login_option,email',
                Rule::exists('users')->where('type', UserType::Subscriber->value),
            ],
            'password' => 'required_if:login_option,email|min:6',
        ];
    }

    public function messages()
    {
        return [
            'login_option.Illuminate\Validation\Rules\Enum' => ":attribute must be in `email` or `mobile`"
        ];
    }
}
