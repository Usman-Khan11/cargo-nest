<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiscalYear extends Model
{
    use HasFactory;
    protected $table = 'fiscal_years';

    public function company()
    {
        return $this->belongsTo(SubCompany::class, 'company_id', 'id');
    }
}
