<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountIntegratePartyParent extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'account_integrate_party_parents';
    protected $appends = ['operation_value', 'job_type_value', 'sub_type_value'];

    public function getOperationValueAttribute()
    {
        return operations()[$this->operation] ?? $this->operation;
    }

    public function getJobTypeValueAttribute()
    {
        return job_types()[$this->job_type] ?? $this->job_type;
    }

    public function getSubTypeValueAttribute()
    {
        return sub_types()[$this->sub_type] ?? $this->sub_type;
    }

    public function account()
    {
        return $this->belongsTo(ChartAccount::class, 'account_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(Location::class, 'city_id', 'id');
    }
}
