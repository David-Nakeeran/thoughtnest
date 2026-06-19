<?php

namespace App\Http\Requests;

use App\Models\MoodReport;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMoodReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', MoodReport::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'mood' => ['required', 'integer', 'min:1', 'max:10'],
            'anxiety' => ['required', 'integer', 'min:1', 'max:10'],
            'stress' => ['required', 'integer', 'min:1', 'max:10'],
            'notes' => ['nullable'],
        ];
    }
}
