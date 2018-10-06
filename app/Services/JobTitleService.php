<?php

namespace App\Services;

use App\Models\JobTitle;
use Illuminate\Http\Request;

class JobTitleService
{
    public function __construct()
    {
        # code...
    }

    public function create($data = [])
    {
        $item = new JobTitle($data);
        $item->save();
        return $item;
    }
}
