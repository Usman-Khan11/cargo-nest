<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partyCenter extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'party_center';
}