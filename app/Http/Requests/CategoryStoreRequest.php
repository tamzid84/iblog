<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'name'        => ['required','string','max:255'],
            'slug'        => ['required','string','max:255','alpha_dash','unique:categories,slug'],
            'parent_id'   => ['nullable','exists:categories,id'],
            'description' => ['nullable','string'],
        ];
    }
}