<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ctrk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'ctrk';

    public function sizetype()
    {
        return $this->belongsTo(Equipment::class, 'size_type', 'id');
    }

    public function principals()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'principal', 'id');
    }
}
