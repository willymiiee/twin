<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Department extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'location_id' => 'required|exists:locations,id|integer',
            'name' => 'required',
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
            'location_id.required' => 'ID Kantor harus diisi',
            'location_id.exists' => 'Kantor tidak valid',
            'location_id.integer' => 'ID Kantor yang dipilih harus berupa angka',
            'name.required' => 'Nama departemen harus diisi',
        ];
    }
}
