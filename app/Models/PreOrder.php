<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class PreOrder extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeThisMonth($query)
    {
        return $query->where(DB::raw('month(created_at) = month(now()) AND year(created_at) = year(now())'));
    }

}
