<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class UserService
{
    public function __construct()
    {
        # code...
    }

    public function create($data = [])
    {
        $item = new User($data);
        $item->save();
        return $item;
    }

    public function update($id, $data = [])
    {
        $item = User::find($id);
        $item->update($data);
        $item->save();
        return $item;
    }
}
