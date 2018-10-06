<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class RegisterRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required|confirmed|min:8|max:16',
            'company_name' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi',
            'phone.required' => 'Nomor telepon harus diisi',
            'password.required'  => 'Kata sandi harus diisi',
            'password.confirmed' => 'Konfirmasi kata sandi harus cocok',
            'password.min'      => 'Kata sandi minimal 8 karakter',
            'password.max'      => 'Kata sandi maksimal 16 karakter',
            'company_name.required' => 'Nama perusahaan harus diisi',
        ];
    }
}
