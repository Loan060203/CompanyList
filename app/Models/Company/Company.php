<?php

namespace App\Models\Company;

use App\Builders\CompanyBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;





/**
 * @mixin IdeHelperCompany
 */
class Company extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'classification',
        'code',
        'name',
        'yomigana',
        'post',
        'address',
        'tel1',
        'tel2',
        'fax',
        'contact_name',
        'url',
        'dsp_ord_num',
        'remark',
        'idv_mgmt',
        'use_flg'
    ];

    public function branches(): HasMany
    {
        return $this->hasMany(CompanyBranch::class);
    }

    public function branches_classification(): Collection
    {
        return $this->branches()->select('classification')->distinct()->get()->pluck('classification');
    }

    public function newEloquentBuilder($query)
    {
        return new CompanyBuilder($query);
    }
}
