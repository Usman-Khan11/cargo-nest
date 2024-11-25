<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bl extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'bl';

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_no', 'id');
    }

    public function shippers()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'shipper', 'id');
    }

    public function consignees()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'consignee', 'id');
    }

    public function notify_party_1()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'notify1', 'id');
    }

    public function notify_party_2()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'notify2', 'id');
    }

    public function vessels()
    {
        return $this->belongsTo(Vessel::class, 'vessel', 'id');
    }

    public function voyages()
    {
        return $this->belongsTo(Voyage::class, 'voyage', 'id');
    }

    public function port_of_loading()
    {
        return $this->belongsTo(Location::class, 'pol', 'id');
    }

    public function port_of_final_dest()
    {
        return $this->belongsTo(Location::class, 'pofd', 'id');
    }

    public function port_of_terminal()
    {
        return $this->belongsTo(Location::class, 'pot', 'id');
    }

    public function final_destination()
    {
        return $this->belongsTo(Location::class, 'final_destination', 'id');
    }

    public function commodities()
    {
        return $this->belongsTo(Commodity::class, 'commodity', 'id');
    }

    public function overseas_agents()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'overseas_agent', 'id');
    }

    public function sline_carriers()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'shipping_line_carrier', 'id');
    }
}
