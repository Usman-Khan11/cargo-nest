<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartyLocalizeKyc extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'party_localize_kyc';
}