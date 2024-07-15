<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charges extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = ['tax'=>'array'];
    
     public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency', 'id');
    }
}