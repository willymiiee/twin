<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

class UserJobTitle extends Model
{
    protected $guarded = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
