<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class EmployeeRequest extends FormRequest
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
                    'first_name' => ['required', 'min:3', 'max:100'],
                    'last_name' => ['required', 'min:3', 'max:100'],
                    'email' => ['required', 'email','min:2', 'max:100',Rule::unique('users','email')],
                    'phone' => ['required','min:4', 'max:100',Rule::unique('users','phone')],
                    "password" => ["required","confirmed",Password::min(6)->mixedCase()->symbols()->numbers()],
                    'image' => ['nullable','image','max:10240','mimes:jpeg,png,jpg'],
                    'department_id' => ['required','exists:departments,id'],
                    'user_id' => ['required',Rule::exists('users','id')
                        /*->whereNull('user_id')*/
                        ],
                    'salary' => ['required','numeric','min:1'],
                ];
            case 'PUT':
            case 'PATCH':

                $employee = $this->route('employee');
                return [
                    'first_name' => ['required', 'min:3', 'max:100'],
                    'last_name' => ['required', 'min:3', 'max:100'],
                    'email' => ['required', 'email','min:2', 'max:100',Rule::unique('users','email')->ignore($employee->id)],
                    'phone' => ['required','min:2', 'max:100',Rule::unique('users','phone')->ignore($employee->id)],
                    "password" => ["nullable","confirmed",Password::min(6)->mixedCase()->symbols()->numbers()],
                    'image' => ['nullable','image','max:10240','mimes:jpeg,png,jpg'],
                    'department_id' => ['required','exists:departments,id'],
                    'user_id' => ['required',Rule::exists('users','id')
                        /*->whereNull('user_id')*/
                        ],
                    'salary' => ['required','numeric','min:1'],
                ];

        }
    }
}
