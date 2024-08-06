<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LineStoreRequest extends FormRequest
{
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
            'number' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:7',
            'style' => 'nullable|in:fill,transparent',
            'circular' => 'nullable|boolean',
            'external_id' => 'nullable|string|max:128',
            'sort' => 'nullable|integer',
            'translations' => 'array',
            'translations.*.language_id' => 'required|exists:languages,id',
            'translations.*.value' => 'required|string',
        ];
    }
}
