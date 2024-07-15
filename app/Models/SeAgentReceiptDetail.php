<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeAgentReceiptDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'se_agent_receipt_detail';
}