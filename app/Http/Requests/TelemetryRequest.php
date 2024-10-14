<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TelemetryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth('sanctum')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'event_name' => 'required|string|max:255',
            'event_data' => 'required|array',
            'user_location' => 'nullable|string|max:255',
        ];
    }
}
