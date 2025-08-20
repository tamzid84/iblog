<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        $id = $this->route('category'); // model binding or ID
        $id = is_object($id) ? $id->id : $id;

        return [
            'name'        => ['required','string','max:255'],
            'slug'        => ['required','string','max:255','alpha_dash',"unique:categories,slug,{$id}"],
            'parent_id'   => ['nullable','exists:categories,id','not_in:'.$id],
            'description' => ['nullable','string'],
        ];
    }
}