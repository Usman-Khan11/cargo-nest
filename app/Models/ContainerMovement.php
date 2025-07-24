<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContainerMovement extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'container_movements';

    public function container()
    {
        return $this->belongsTo(Ctrk::class, 'container_id', 'id');
    }

    public function destination_agent()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'destination_principal', 'id');
    }

    public function loc_from()
    {
        return $this->belongsTo(Location::class, 'location_from', 'id');
    }

    public function loc_to()
    {
        return $this->belongsTo(Location::class, 'location_to', 'id');
    }

    public function vessel()
    {
        return $this->belongsTo(Vessel::class, 'vessel_id', 'id');
    }

    public function voyage()
    {
        return $this->belongsTo(Voyage::class, 'voyage_id', 'id');
    }

    public function created_by_user()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }
}
