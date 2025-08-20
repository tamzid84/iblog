<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        $id = $this->route('post');
        $id = is_object($id) ? $id->id : $id;

        return [
            'title'       => ['required','string','max:255'],
            'slug'        => ['required','string','max:255','alpha_dash',"unique:posts,slug,{$id}"],
            'content'     => ['required','string'],
            'category_id' => ['required','exists:categories,id'],
        ];
    }
}
