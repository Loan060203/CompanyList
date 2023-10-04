<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use PhpParser\Builder;


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

    public function scopeUseFlgDropdown($query, $use_flg)
    {
        return $query->where(function ($query) use ($use_flg) {
            $query->where('use_flg', '=', $use_flg)
                ->orWhere('use_flg', '=', $use_flg)
                ->orWhereNull('use_flg');

        });
    }
}
