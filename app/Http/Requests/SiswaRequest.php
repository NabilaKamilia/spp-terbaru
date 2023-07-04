<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'NISN' => 'required',
            'jenis_kelamin' => 'required',
            'TahunAjaran' => 'required',
            'kelas_id' => 'required',
            'user_id' => 'required',
            
        ];
    }
}
