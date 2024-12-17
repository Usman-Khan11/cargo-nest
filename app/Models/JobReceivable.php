<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobReceivable extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'job_receivable';

    public function charges()
    {
        return $this->belongsTo(Charges::class, 'cr_chrg', 'id');
    }

    public function size_type()
    {
        return $this->belongsTo(Equipment::class, 'crp_size_type', 'id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'crp_currency', 'id');
    }
}
