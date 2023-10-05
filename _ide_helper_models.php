<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Company{
/**
 * App\Models\Company\Company
 *
 * @property int $id
 * @property int $classification
 * @property string $code
 * @property string $name
 * @property string|null $yomigana
 * @property string|null $post
 * @property string|null $address
 * @property string|null $tel1
 * @property string|null $tel2
 * @property string|null $fax
 * @property string|null $contact_name
 * @property string|null $url
 * @property int $dsp_ord_num
 * @property string|null $remark
 * @property int $idv_mgmt
 * @property int $use_flg
 * @property int $created_by
 * @property int $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Company\CompanyBranch> $branches
 * @property-read int|null $branches_count
 * @method static \Database\Factories\Company\CompanyFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company useFlgDropdown($use_flg)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereClassification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereContactName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereDspOrdNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereIdvMgmt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTel1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTel2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUseFlg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereYomigana($value)
 * @mixin \Eloquent
 */
	class Company extends \Eloquent {}
}

namespace App\Models\Company{
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
 */
	class CompanyBranch extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\District
 *
 * @property int $id
 * @property string $name
 * @property int $use_flg
 * @method static \Database\Factories\DistrictFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|District newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District query()
 * @method static \Illuminate\Database\Eloquent\Builder|District whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereUseFlg($value)
 * @mixin \Eloquent
 */
	class District extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

