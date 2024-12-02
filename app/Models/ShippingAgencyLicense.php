<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAgencyLicense extends Model
{
    use HasFactory;
    protected $table = 'shipping_agency_license';
    protected $casts = ['lists' => 'array'];
}
