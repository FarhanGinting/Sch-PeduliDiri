<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatatanCreateRequest extends FormRequest
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
            'nama' => 'unique:catatan|max:16',
            'alamat' => 'max:50'

        ];
    }

    public function messages()
    {
        return [
            'nama.max' => 'Nama Perjalanan Melebihi Batas :max',
            'nama.unique' => 'Nama Perjalanan Tidak Boleh Sama',

        ];
    }
}