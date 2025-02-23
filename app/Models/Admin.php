<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    protected $casts = ['access' => 'array'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(AdminRole::class, 'role_id', 'id');
    }

    public function rights()
    {
        return $this->belongsTo(AdminRight::class, 'id', 'admin_id');
    }

    public function company()
    {
        return $this->belongsTo(SubCompany::class, 'company_id', 'id');
    }
}
