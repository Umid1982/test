<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StationUpdateRequest extends FormRequest
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
            'line_id' => 'nullable|exists:lines,id',
            'number' => 'nullable|string|max:10',
            'name' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:7',
            'style' => 'nullable|in:fill,transparent',
            'circular' => 'nullable|boolean',
            'external_id' => 'nullable|string|max:128',
            'sort' => 'nullable|integer',
            'translations' => 'array',
            'translations.*.language_id' => 'nullable|exists:languages,id',
            'translations.*.value' => 'nullable|string',
            'transfers' => 'array',
            'transfers.*.station_to_id' => 'nullable|exists:stations,id',
            'transfers.*.type' => 'nullable|in:mcc,mcd,metro,ground',
            'transfers.*.name' => 'nullable|string|max:255',
            'transfers.*.code' => 'nullable|string|max:50',
            'transfers.*.icon' => 'nullable|string|max:500',
            'audio' => 'array',
            'audio.*.direction' => 'nullable|in:forward,backward',
            'audio.*.action' => 'nullable|in:arrive,departure,toend',
            'audio.*.sound' => 'nullable|string|max:500',
            'features' => 'array',
            'features.*.feature_id' => 'nullable|exists:stations_features,id',
        ];
    }
}
