<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StationStoreRequest extends FormRequest
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
            'line_id' => 'required|exists:lines,id',
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
            'transfers' => 'array',
            'transfers.*.station_to_id' => 'nullable|exists:stations,id',
            'transfers.*.type' => 'required|in:mcc,mcd,metro,ground',
            'transfers.*.name' => 'nullable|string|max:255',
            'transfers.*.code' => 'nullable|string|max:50',
            'transfers.*.icon' => 'nullable|string|max:500',
            'audio' => 'array',
            'audio.*.direction' => 'required|in:forward,backward',
            'audio.*.action' => 'required|in:arrive,departure,toend',
            'audio.*.sound' => 'nullable|string|max:500',
            'features' => 'array',
            'features.*.feature_id' => 'required|exists:stations_features,id',
        ];
    }
}
