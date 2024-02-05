<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCatatanCreateRequest extends FormRequest
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
            'nama' => 'max:24',
            'alamat' => 'max:50',
            'suhu' => 'integer|between:-99,99',
        ];
    }

    public function messages()
    {
        return [
            'nama.max' => 'Nama Perjalanan Melebihi Batas :max',
            
            'suhu.integer' => 'Suhu harus berupa bilangan bulat.',
            'suhu.between' => 'Suhu harus berada dalam rentang -99 hingga 99.',
        ];
    }
}
