<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'vouchers';

    public function company()
    {
        return $this->belongsTo(SubCompany::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
