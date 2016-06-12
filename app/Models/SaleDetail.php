<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class SaleDetail extends Model
{
    public function scopeThisMonth($query)
    {
        return $query->where(DB::raw('month(created_at) = month(now()) AND year(created_at) = year(now())'));
    }
}
