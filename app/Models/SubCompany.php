<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCompany extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'sub_company';

    public function country()
    {
        return $this->belongsTo(Location::class, 'country', 'id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency', 'id');
    }
}
