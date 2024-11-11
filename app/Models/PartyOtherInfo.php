<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartyOtherInfo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'party_other_info';
    protected $casts = [
        'ownership' => 'array'
    ];
}