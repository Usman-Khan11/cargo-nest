<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartAccount extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'chart_accounts';
    protected $casts = ['details' => 'array'];
    
    public function parent_acc()
    {
        return $this->belongsTo(ChartAccount::class, 'parent_acc', 'id');
    }
}