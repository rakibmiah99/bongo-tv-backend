<?php

namespace App\Http\Requests\Admin\SubCategory;

use App\Models\SubCategory;
use App\Rules\UniqueSlug;
use App\Traits\ValidationRequestHandle;
use Illuminate\Foundation\Http\FormRequest;

class StoreSubCategoryRequest extends FormRequest
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
            'category_id' => 'required|numeric|exists:categories,id',
            'name' => [
                'string',
                'required',
                new UniqueSlug(SubCategory::class, null, ['category_id'])
            ],
            'visibility' => 'nullable|boolean'
        ];
    }
}
