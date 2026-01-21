<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreAlertInputRow extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'pre_alert_input_rows';

    public function pre_alert_input()
    {
        return $this->belongsTo(PreAlertInput::class);
    }

    public function container()
    {
        return $this->belongsTo(Ctrk::class, 'container_id');
    }

    public function size_type()
    {
        return $this->belongsTo(Equipment::class, 'size_type_id');
    }

    public function principal()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'principal_id', 'id');
    }
}
