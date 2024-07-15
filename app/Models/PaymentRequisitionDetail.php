<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRequisitionDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'payment_requisition_detail';
}