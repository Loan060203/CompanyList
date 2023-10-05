<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
class District extends Model
{
    use HasFactory;

    public $timestamps = false;
}
