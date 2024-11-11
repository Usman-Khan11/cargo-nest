<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavPermission extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'nav_permissions';
    
    public function role()
    {
        return $this->belongsTo(AdminRole::class, 'role_id', 'id');
    }
    
    public function nav()
    {
        return $this->belongsTo(Nav::class, 'nav_id', 'id');
    }
    
    public function nav_key()
    {
        return $this->belongsTo(NavKey::class, 'nav_key_id', 'id');
    }
}