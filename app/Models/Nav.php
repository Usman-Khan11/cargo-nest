<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'navs';
    
    public function nav_key()
    {
        return $this->hasMany(NavKey::class, 'nav_id');
    }
}