<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'bl_detail';

    public function place_of_receipt()
    {
        return $this->belongsTo(Location::class, 'b_place_of_receipt', 'id');
    }

    public function port_of_loading()
    {
        return $this->belongsTo(Location::class, 'b_port_of_loading', 'id');
    }

    public function port_of_discharge()
    {
        return $this->belongsTo(Location::class, 'b_port_of_discharge', 'id');
    }

    public function place_of_delivery()
    {
        return $this->belongsTo(Location::class, 'b_place_of_delivery', 'id');
    }
}
