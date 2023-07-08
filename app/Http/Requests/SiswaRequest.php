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
            'nisn' => 'required',
            'jenis_kelamin' => 'required',
<<<<<<< HEAD
=======
            'TahunAjaran' => 'required',
            'kelas_id' => 'required',
>>>>>>> fe494c96cb37f7c923dcd4a479e002d0f077d1c7
            'user_id' => 'required',

        ];
    }
}
