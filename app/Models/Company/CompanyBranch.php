<?php

namespace App\Models\Company;

use App\Models\District;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Company\CompanyBranch
 *
 * @property int $id
 * @property int $classification
 * @property int $company_id
 * @property int $district_id
 * @property string $code
 * @property string $name
 * @property string|null $yomigana
 * @property string|null $std_payment
 * @property string|null $tax_classify
 * @property int $dsp_ord_num
 * @property string|null $remark
 * @property int $idv_mgmt
 * @property int $use_flg
 * @property int $created_by
 * @property int $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company\Company $company
 * @property-read District $district
 * @method static \Database\Factories\Company\CompanyBranchFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyBranch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyBranch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyBranch query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyBranch whereClassification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyBranch whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyBranch whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyBranch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyBranch whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyBranch whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyBranch whereDspOrdNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyBranch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyBranch whereIdvMgmt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyBranch whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyBranch whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyBranch whereStdPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyBranch whereTaxClassify($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyBranch whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyBranch whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyBranch whereUseFlg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyBranch whereYomigana($value)
 * @mixin \Eloquent
 * @mixin IdeHelperCompanyBranch
 */
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

