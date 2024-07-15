<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentPaymentRequisitionDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'agent_payment_requisition_detail';
}