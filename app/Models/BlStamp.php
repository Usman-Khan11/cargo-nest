<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlStamp extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'bl_stamp';
}