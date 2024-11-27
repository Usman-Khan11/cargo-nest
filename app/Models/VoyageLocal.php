<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoyageLocal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function local_ports()
    {
        return $this->belongsTo(Location::class, 'local_port', 'id');
    }
}
