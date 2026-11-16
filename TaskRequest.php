<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string', 'max:2000'],
            'assigned_to' => ['required', 'string', 'max:120'],
            'status' => ['required', Rule::in(['pending', 'in_progress', 'done'])],
            'due_date' => ['nullable', 'date'],
        ];
    }
}
