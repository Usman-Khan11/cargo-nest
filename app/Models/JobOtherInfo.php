<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOtherInfo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'job_other_info';
}