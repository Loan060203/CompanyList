<?php

namespace App\Models\Company;

use App\Models\District;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyBranch extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'classification',
        'company_id',
        'district_id',
        'code',
        'name',
        'yomigana',
        'std_payment',
        'tax_classify',
        'dsp_ord_num',
        'remark',
        'idv_mgmt',
        'use_flg',
        'post',
        'address',
        'tel1',
        'tel2',
        'fax',
        'contact_name',
        'url',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
}

