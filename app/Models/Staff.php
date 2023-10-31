<?php

namespace App\Models;


use App\Models\Company\Company;
use App\Models\Company\CompanyBranch;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

/**
 * @mixin IdeHelperStaff
 * @method static factory()
 */
class Staff extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'classification',
        'branch_id',
        'user_id',
        'email',
        'code',
        'name',
        'yomigana',
        'position',
        'permission_flg',
        'dsp_ord_num',
        'remark',
        'idv_mgmt',
        'use_flg',
        'created_by',
        'updated_by'
    ];

    public $table = "staff";

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(CompanyBranch::class);
    }

    public function company(): HasOneThrough
    {
        return $this->hasOneThrough(Company::class, CompanyBranch::class, 'id', 'id', 'branch_id', 'company_id');
    }

}
