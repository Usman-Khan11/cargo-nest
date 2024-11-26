<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRouting extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'job_routing';

    public function place_of_receipt()
    {
        return $this->belongsTo(Location::class, 'r_place_of_receipt', 'id');
    }

    public function port_of_loading()
    {
        return $this->belongsTo(Location::class, 'r_port_of_loading', 'id');
    }

    public function port_of_discharge()
    {
        return $this->belongsTo(Location::class, 'r_port_of_discharge', 'id');
    }

    public function final_destination()
    {
        return $this->belongsTo(Location::class, 'r_final_destination', 'id');
    }

    public function terminals()
    {
        return $this->belongsTo(PartyLocation::class, 'r_terminal', 'id');
    }
}
