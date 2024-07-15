<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartyBasicInfo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = ['operation_check'=>'array', 'Type'=>'array', 'nomination'=>'array', 'restriction'=>'array'];
    
    public function city(){
        return $this->belongsTo(Location::class, 'city', 'id');
    }
    
}