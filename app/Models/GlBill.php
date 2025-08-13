<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlBill extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'gl_bills';

    public function company()
    {
        return $this->belongsTo(SubCompany::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
