<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeLetterTemplate extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'se_letter_template';
}