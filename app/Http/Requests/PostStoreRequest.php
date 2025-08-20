<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'title'       => ['required','string','max:255'],
            'slug'        => ['required','string','max:255','alpha_dash','unique:posts,slug'],
            'content'     => ['required','string'],
            'category_id' => ['required','exists:categories,id'],
        ];
    }
}