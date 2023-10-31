<?php

namespace App\Models\Setting;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'one_day_aggregation_time',
        'one_year_aggregation_time',
        'std_sort_order',
        'std_registration_factory',
        'pagination_num',
    ];

    public $table = "user_setting";

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }
}
