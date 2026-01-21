<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreAlertInput extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'pre_alert_inputs';

    public function overseas_agent()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'overseas_agent_id', 'id');
    }

    public function vessel()
    {
        return $this->belongsTo(Vessel::class, 'vessel_id', 'id');
    }

    public function voyage()
    {
        return $this->belongsTo(Voyage::class, 'voyage_id', 'id');
    }

    public function rows()
    {
        return $this->hasMany(PreAlertInputRow::class);
    }
}
