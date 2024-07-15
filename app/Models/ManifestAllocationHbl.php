<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManifestAllocationHbl extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'manifest_allocation_hbl';
}