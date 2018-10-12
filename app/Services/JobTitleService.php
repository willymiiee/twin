<?php

namespace App\Services;

use App\Http\Resources\JobTitle as JobTitleResource;
use App\Models\JobTitle;
use Illuminate\Http\Request;

class JobTitleService
{
    public function __construct()
    {
        # code...
    }

    public function list($departmentId, $perPage = 5)
    {
        $items = JobTitle::where('department_id', $departmentId)->paginate((int)$perPage);
        return JobTitleResource::collection($items);
    }

    public function find($departmentId, $id)
    {
        $item = JobTitle::where('department_id', $departmentId)->findOrFail($id);
        return new JobTitleResource($item);
    }

    public function create($data = [])
    {
        $item = new JobTitle($data);
        $item->save();

        foreach ($data['roles'] as $k => $r) {
            $data['roles'][$k]['module_id'] = $k;
            $data['roles'][$k]['job_title_id'] = $item->id;
        }

        $item->roles()->createMany($data['roles']);
        return $item;
    }

    public function update($departmentId, $data = [], $id)
    {
        $item = JobTitle::where('department_id', $departmentId)->findOrFail($id);
        $item->update($data);

        foreach ($data['roles'] as $k => $r) {
            $where = [
                'module_id' => $k,
                'job_title_id' => $item->id,
            ];
            $role = [
                'list' => $r['list'],
                'detail' => $r['detail'],
                'create' => $r['create'],
                'update' => $r['update'],
                'delete' => $r['delete'],
            ];
            $item->roles()->updateOrCreate($where, $role);
        }
    }

    public function delete($departmentId, $id)
    {
        $item = JobTitle::where('department_id', $departmentId)->findOrFail($id);
        $item->roles()->delete();
        $item->delete();
    }
}
