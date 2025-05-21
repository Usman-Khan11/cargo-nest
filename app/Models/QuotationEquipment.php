<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuotationEquipment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'quotation_equipments';

    public function size_types()
    {
        return $this->belongsTo(Equipment::class, 'size_type', 'id');
    }

    public function principals()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'principal', 'id');
    }
}
