<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class PriorityController extends Controller
{
    public function index()
    {
        $chart = "['Products', 'Priority Value', { role: 'style' } ],";
        $products = Product::all();
        foreach ($products as $product) {
            $saledProduct = $this->getSaledProductScore($product->productsInSale()->thisMonth()->count());
            $orderedProduct = $this->getOrderedProductScore($product->productsInPreOrder()->thisMonth()->count());
            $priceProduct = $this->getProductPriceScore($product->price);
            $stockProduct = $this->getStockScore($product->stock());
            $value = $saledProduct + $orderedProduct + $priceProduct + $stockProduct;
            $item = "['".$product->name."', $value, 'color: green'],";
            $chart .= $item;
        }
        return view('priority.index',compact('chart'));
    }

    private function getSaledProductScore($saledProduct)
    {
        if ($saledProduct > 100){
            return 40;
        }elseif ($saledProduct >= 65){
            return 30;
        }elseif ($saledProduct >= 30){
            return 20;
        }else{
            return 0;
        }
    }

    private function getOrderedProductScore($orderedProduct)
    {
        if ($orderedProduct > 50){
            return 100 * 0.3;
        }elseif ($orderedProduct >= 30){
            return 75 * 0.3;
        }elseif ($orderedProduct >= 10){
            return 50 * 0.3;
        }else{
            return 0;
        }
    }

    private function getProductPriceScore($price){
        if ($price > 1000000){
            return 100 * 0.1;
        }elseif ($price >= 700000){
            return 75 * 0.1;
        }elseif ($price >= 300000){
            return 50 * 0.1;
        }else{
            return 0;
        }
    }

    public function getStockScore($stock)
    {
        if($stock < 20){
            return 100 * 0.2;
        }elseif ($stock < 40){
            return 75 * 0.2;
        }elseif ($stock < 60){
            return 50 * 0.2;
        }elseif ($stock < 80){
            return 25 * 0.2;
        }else{
            return 0;
        }

    }
}
