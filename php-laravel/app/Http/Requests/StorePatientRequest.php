<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required',
            'cpf' => 'required|min:11|max:11|unique:patients',
            'rg' => 'required|min:9|max:9',
            'birthday' => 'required|min:10|max:10',
            'gender' => 'required|min:1|max:1',
            'cell_phone' => 'required|min:11|max:11',
            'email' => 'email',
            'description' => ''
        ];
    }
}
