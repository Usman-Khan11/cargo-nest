<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationRouting extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function vendors()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'vendor', 'id');
    }

    public function overseas_agent()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'overseas', 'id');
    }

    public function sline_carriers()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'sline_carrier', 'id');
    }

    public function principals()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'principal', 'id');
    }

    public function shippers()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'shipper', 'id');
    }

    public function consignees()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'consignee', 'id');
    }

    public function terminals()
    {
        return $this->belongsTo(PartyLocation::class, 'terminals', 'id');
    }

    public function custom_clearance()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'custom_clearance', 'id');
    }

    public function place_of_receipt()
    {
        return $this->belongsTo(Location::class, 'place_of_receipt', 'id');
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
}
