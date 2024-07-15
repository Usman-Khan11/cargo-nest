<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SwitchBlRef extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'switch_bl_ref';
}