<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'supplier_id'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function productsInSale()
    {
        return $this->hasMany(SaleDetail::class);
    }

    public function productsInPreOrder()
    {
        return $this->hasMany(PreOrder::class);
    }

    public function productInReceiving()
    {
        return $this->hasMany(Receiving::class);
    }

    public function stock()
    {
        $receving = $this->productInReceiving()->sum('quantity');
        $sale = $this->productsInSale()->sum('quantity');
        return $receving-$sale;
    }

}
