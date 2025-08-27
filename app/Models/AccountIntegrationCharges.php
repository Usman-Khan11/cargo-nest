<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountIntegrationCharges extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'account_integration_charges';

    public function charges()
    {
        return $this->belongsTo(Charges::class, 'charges_id', 'id');
    }

    public function account()
    {
        return $this->belongsTo(ChartAccount::class, 'account_id', 'id');
    }
}
