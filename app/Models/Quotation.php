<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function clients()
    {
        return $this->belongsTo(PartyBasicInfo::class, 'client', 'id');
    }

    public function sales_rep()
    {
        return $this->belongsTo(Employee::class, 'sale_rep', 'id');
    }

    public function units()
    {
        return $this->belongsTo(Packages::class, 'unit', 'id');
    }

    public function commodities()
    {
        return $this->belongsTo(Commodity::class, 'commodity', 'id');
    }

    public function incoterms()
    {
        return $this->belongsTo(Incoterm::class, 'inco_term', 'id');
    }

    public function vessels()
    {
        return $this->belongsTo(Vessel::class, 'vessel', 'id');
    }

    public function voyages()
    {
        return $this->belongsTo(Voyage::class, 'voyage', 'id');
    }

    public function currencies()
    {
        return $this->belongsTo(Voyage::class, 'currency', 'id');
    }

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
