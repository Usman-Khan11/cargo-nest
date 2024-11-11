<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRight extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'admin_rights';
    
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
}