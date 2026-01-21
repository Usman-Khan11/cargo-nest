<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vessel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function voyages()
    {
        return $this->hasMany(Voyage::class, 'vessel');
    }
}
