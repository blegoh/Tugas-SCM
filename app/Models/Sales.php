<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'address', 'phone','email'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class,'sale_details');
    }

    

}
