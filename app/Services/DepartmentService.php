<?php

namespace App\Services;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentService
{
    public function __construct()
    {
        # code...
    }

    public function create($data = [])
    {
        $item = new Department($data);
        $item->save();
        return $item;
    }
}
