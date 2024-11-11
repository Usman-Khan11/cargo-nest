<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationRouting extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
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