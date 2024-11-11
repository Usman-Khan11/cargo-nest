<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartyAccountDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'party_account_detail';
    protected $casts = [
        'sub_type_input' => 'array'
    ];

    public function party_basic_id()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'party_basic_id', 'id');
    }
}
