<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'job';
    
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