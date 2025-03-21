<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTransaksiRequest extends FormRequest
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
            'jumlah' => ['required', 'numeric'],
            'keterangan' => ['required', 'string'],
            'jenis' => ['required', 'in:pemasukan,pengeluaran'],
        ];
    }

    public function messages(): array
    {
        return [
            'jumlah.required' => ':attribute wajib diisi.',
            'jumlah.numeric' => ':attribute harus berupa angka.',
            'keterangan.required' => ':attribute wajib diisi.',
            'keterangan.string' => ':attribute harus berupa string.',
            'jenis.required' => ':attribute wajib dipilih.',
            'jenis.in' => ':attribute haruslah pemasukan atau pengeluaran.',
        ];
    }
}
