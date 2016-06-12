<?php

namespace App\Http\Controllers;

use App\Models\SaleDetail;
use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cart;

use App\Http\Requests;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sale.index');
    }

    public function indexAPI()
    {
        return Cart::items();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale = new Sales();
        $sale->save();
        foreach (Cart::items() as $item){
            $detail = new SaleDetail();
            $detail->product_id = $item->id;
            $detail->sale_id = $sale->id;
            $detail->quantity = $item->quantity;
            $detail->price = $item->price;
            $detail->save();
        }
        Cart::clear();
        return redirect('sale');
    }

    public function addList(Request $request)
    {
        Cart::add([
            'id'       => $request->id,
            'name'     => $request->name,
            'quantity' => $request->quantity,
            'price'    => $request->price
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Cart::updateQty($id, $request->quantity);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
    }
}
