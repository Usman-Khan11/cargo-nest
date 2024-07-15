<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlContainer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'bl_container';
}