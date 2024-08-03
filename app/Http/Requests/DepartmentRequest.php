<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class DepartmentRequest extends FormRequest
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
        switch ($this->method()){
            case 'POST':
                return [
                    'name' => ['required', 'min:2', 'max:100'],
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'name' => ['required', 'min:2', 'max:100'],
                ];

        }
    }
}
