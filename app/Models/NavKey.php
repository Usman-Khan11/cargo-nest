<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavKey extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'nav_keys';
    
    public function nav()
    {
        return $this->belongsTo(Nav::class, 'nav_id', 'id');
    }
}