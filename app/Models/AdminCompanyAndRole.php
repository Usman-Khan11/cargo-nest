<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCompanyAndRole extends Model
{
    use HasFactory;
    protected $table = 'admin_company_and_roles';

    public function company()
    {
        return $this->belongsTo(SubCompany::class, 'company_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(AdminRole::class, 'role_id', 'id');
    }
}
