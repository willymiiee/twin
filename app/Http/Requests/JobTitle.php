<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobTitle extends FormRequest
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
            'department_id' => 'required|exists:departments,id|integer',
            'name' => 'required',
            'is_dept_head' => 'required|boolean',
            'roles' => 'required|array',
            'roles.*.list' => 'required|boolean',
            'roles.*.detail' => 'required|boolean',
            'roles.*.create' => 'required|boolean',
            'roles.*.update' => 'required|boolean',
            'roles.*.delete' => 'required|boolean',
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
            'department_id.required' => 'ID Departemen harus diisi',
            'department_id.exists' => 'Departemen tidak valid',
            'department_id.integer' => 'ID Departemen yang dipilih harus berupa angka',
            'name.required' => 'Nama departemen harus diisi',
            'is_dept_head.required' => 'Tentukan apakah jabatan ini adalah kepala departemen atau bukan',
            'roles.required' => 'Hak akses harus diisi',
        ];
    }
}
