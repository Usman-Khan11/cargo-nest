<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartyAchBankDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'party_ach_bank_detail';
}