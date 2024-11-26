<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manifest extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function vessels()
    {
        return $this->belongsTo(Vessel::class, 'vessel', 'id');
    }

    public function voyages()
    {
        return $this->belongsTo(Voyage::class, 'voyage_no', 'id');
    }

    public function terminals()
    {
        return $this->belongsTo(PartyLocation::class, 'terminals', 'id');
    }

    public function shipping_line()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'agent', 'id');
    }

    public function shipping_license()
    {
        return $this->belongsTo(Location::class, 'license', 'id');
    }

    public function local_port()
    {
        return $this->belongsTo(Location::class, 'port', 'id');
    }
}
