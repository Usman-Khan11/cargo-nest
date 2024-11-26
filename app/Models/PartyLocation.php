<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartyLocation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'party_location';

    protected $casts = ['Type' => 'array'];

    public function city()
    {
        return $this->belongsTo(Location::class, 'city', 'id');
    }

    public function party()
    {
        return $this->belongsTo(Location::class, 'party', 'id');
    }
}
