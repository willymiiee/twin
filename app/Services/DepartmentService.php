<?php

namespace App\Services;

use App\Http\Resources\Department as DepartmentResource;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentService
{
    public function __construct()
    {
        # code...
    }

    public function list($companyId, $perPage = 5)
    {
        $items = Department::where('company_id', $companyId)->paginate((int)$perPage);
        return DepartmentResource::collection($items);
    }

    public function find($id)
    {
        $item = Department::findOrFail($id);
        return new DepartmentResource($item);
    }

    public function create($data = [])
    {
        $item = new Department($data);
        $item->save();
        return $item;
    }

    public function update($data = [], $id)
    {
        $item = Department::findOrFail($id)->update($data);
    }

    public function delete($id)
    {
        $item = Department::findOrFail($id);
        $item->delete();
    }
}
