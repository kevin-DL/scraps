<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeSearchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'ingredients' => ['required', 'string', 'min:3']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
