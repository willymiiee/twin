<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    const STATUS_ACTIVE             = 'active';
    const STATUS_NON_ACTIVE         = 'non_active';
    const STATUS_NEED_ACTIVATION    = 'need_activation';

    use HasApiTokens, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'avatar',
        'identity_number',
        'driver_license',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
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

    public function jobTitles()
    {
        return $this->belongsToMany('App\Models\JobTitle', 'user_job_title');
    }

    public function company()
    {
        $jobTitles = $this->jobTitles();
        return $jobTitles->get()[0]->company();
    }
}
