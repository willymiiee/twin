<?php

namespace App\Services;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationService
{
    public function __construct()
    {
        # code...
    }

    public function create($data = [])
    {
        $data['timezone'] = !array_key_exists('timezone', $data) ? Location::DEFAULT_TIMEZONE : $data['timezone'];
        $data['currency'] = !array_key_exists('currency', $data) ? Location::DEFAULT_CURRENCY : $data['currency'];
        $data['country'] = !array_key_exists('country', $data) ? Location::DEFAULT_COUNTRY : $data['country'];

        $item = new Location($data);
        $item->save();
        return $item;
    }
}
