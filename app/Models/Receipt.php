<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = ['types' => 'array'];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_number', 'id');
    }
}
