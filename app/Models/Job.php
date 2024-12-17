<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'job';

    public function job_routing()
    {
        return $this->belongsTo(JobRouting::class, 'id', 'job_id');
    }

    public function clients()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'client', 'id');
    }

    public function bl()
    {
        return $this->belongsTo(Bl::class, 'id', 'job_id');
    }

    public function shippers()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'shipper', 'id');
    }

    public function consignees()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'consignee', 'id');
    }

    public function vessels()
    {
        return $this->belongsTo(Vessel::class, 'vessel', 'id');
    }

    public function voyages()
    {
        return $this->belongsTo(Voyage::class, 'voyage', 'id');
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

    public function created_by()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }

    public function last_updated_by()
    {
        return $this->belongsTo(Admin::class, 'last_updated_by', 'id');
    }

    public function approved_by()
    {
        return $this->belongsTo(Admin::class, 'approved_by', 'id');
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

    public function custom_clearance()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'custom_clearance', 'id');
    }
}
