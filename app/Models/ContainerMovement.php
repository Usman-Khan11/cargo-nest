<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContainerMovement extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'container_movements';

    public function container()
    {
        return $this->belongsTo(Ctrk::class, 'container_id', 'id');
    }

    public function created_by_user()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }
}
