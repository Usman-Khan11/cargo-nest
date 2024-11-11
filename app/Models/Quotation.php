<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function created_by()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }
    
    public function last_updated_by()
    {
        return $this->belongsTo(Admin::class, 'last_updated_by', 'id');
    }
    
    public function approved_by()
    {
        return $this->belongsTo(Admin::class, 'approved_by', 'id');
    }
}