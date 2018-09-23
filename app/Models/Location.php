<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    const DEFAULT_TIMEZONE  = 'UTC+8';
    const DEFAULT_CURRENCY  = 'IDR';
    const DEFAULT_COUNTRY   = 'ID';

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'name',
        'address',
        'latitude',
        'longitude',
        'country',
        'state',
        'city',
        'timezone',
        'currency'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
