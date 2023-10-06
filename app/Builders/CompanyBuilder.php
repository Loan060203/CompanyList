<?php

namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;

class CompanyBuilder extends Builder
{
    public function UseFlgDropdown( $use_flg): CompanyBuilder
    {
        return $this->where(function ($query) use ($use_flg) {
            $query->where('use_flg', '=', $use_flg)
                ->orWhere('use_flg', '=', $use_flg);
        });
    }
}
