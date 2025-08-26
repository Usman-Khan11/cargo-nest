<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartyBasicInfo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = ['operation_check' => 'array', 'Type' => 'array', 'nomination' => 'array', 'restriction' => 'array'];

    public function city()
    {
        return $this->belongsTo(Location::class, 'city', 'id');
    }

    public function other_info()
    {
        return $this->belongsTo(PartyOtherInfo::class, 'id', 'party_basic_id');
    }

    public function account_detail()
    {
        return $this->belongsTo(PartyAccountDetail::class, 'id', 'party_basic_id');
    }

    public function party_ach_bank_detail()
    {
        return $this->belongsTo(PartyAchBankDetail::class, 'id', 'party_basic_id');
    }

    public function party_notifications()
    {
        return $this->hasMany(PartyNotification::class, 'party_basic_id', 'id');
    }
}
