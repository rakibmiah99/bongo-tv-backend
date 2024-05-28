<?php

namespace App\Http\Requests\Admin\Category;

use App\Models\Category;
use App\Rules\UniqueSlug;
use App\Traits\ValidationRequestHandle;
use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
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
            'name' => [
                'string',
                'required',
                new UniqueSlug(Category::class)
            ],
            'visibility' => 'nullable|boolean'
        ];
    }
}
