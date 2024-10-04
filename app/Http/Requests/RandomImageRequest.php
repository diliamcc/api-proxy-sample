<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RandomImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'grayScale' => 'nullable|boolean',
            'height' => 'nullable|integer|min:16',
            'width' => 'nullable|integer|min:16',
            'blur' => 'nullable|integer|min:1|max:10',
        ];
    }
}