<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => ['required', 'min:3', 'max:100'],
                    'description' => ['nullable', 'min:3', 'max:190'],
                    'employee_id' => ['required', Rule::exists('users', 'id')->whereNotNull('user_id')],
                ];
            case 'PUT':
            case 'PATCH':
                if (auth()->user()->user_id) {
                    return [
                        'status' => ['nullable', 'in:pending,in_progress,finished'],
                    ];
                } else {
                    return [
                        'name' => ['required', 'min:3', 'max:100'],
                        'description' => ['nullable', 'min:3', 'max:190'],
                        'status' => ['nullable', 'in:pending,in_progress,finished'],
                        'employee_id' => ['required', Rule::exists('users', 'id')->whereNotNull('user_id')],
                    ];
                }
        }
    }
}
