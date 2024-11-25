<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cro extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        "container_details" => "array"
    ];

    public function clients()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'client', 'id');
    }

    public function commodities()
    {
        return $this->belongsTo(Commodity::class, 'commodity', 'id');
    }

    public function vessels()
    {
        return $this->belongsTo(Vessel::class, 'vessel', 'id');
    }

    public function voyages()
    {
        return $this->belongsTo(Voyage::class, 'voyage', 'id');
    }

    public function overseas_agents()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'overseas_agent', 'id');
    }

    public function clearing_agent()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'clearing_agent', 'id');
    }

    public function shippers()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'shipper', 'id');
    }

    public function terminals()
    {
        return $this->belongsTo(PartyLocation::class, 'terminal', 'id');
    }

    public function port_of_loading()
    {
        return $this->belongsTo(Location::class, 'port_of_loading', 'id');
    }

    public function port_of_discharge()
    {
        return $this->belongsTo(Location::class, 'port_of_discharge', 'id');
    }

    public function final_destination()
    {
        return $this->belongsTo(Location::class, 'final_destination', 'id');
    }

    public function pickup_location()
    {
        return $this->belongsTo(PartyLocation::class, 'pickup_location', 'id');
    }

    public function empty_depot()
    {
        return $this->belongsTo(PartyLocation::class, 'empty_depot', 'id');
    }

    public function transporters()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'transporter', 'id');
    }
}
