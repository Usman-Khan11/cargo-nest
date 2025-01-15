<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocsCompanyWise extends Model
{
    use HasFactory;
    protected $table = 'docs_company_wise';

    public function company()
    {
        return $this->belongsTo(SubCompany::class, 'company_id');
    }

    public static function getDocNumber($company_id, $fiscal_year, $document)
    {
        $doc = DocsCompanyWise::where('company_id', $company_id)
            ->where('document', $document)
            ->first();

        if ($doc) {
            $doc->increment('last_no');
            return $doc->company->shortName . $doc->no_seperator . $doc->prefix . $doc->no_seperator . $doc->last_no . $doc->suffix;
        }
    }
}
