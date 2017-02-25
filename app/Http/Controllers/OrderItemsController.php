<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\OrderItem;
use Illuminate\Http\Request;

class OrderItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'product_id' => 'required',
            'amount' => 'required',
        ]);

        $orderItem = new OrderItem();
        $orderItem->product_id = $request->product_id;
        $orderItem->amount = $request->amount;
        $orderItem->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return OrderItem::find($id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addtoorder(Request $request)
    {
        // Check if the product that should get added exists
        if (!Product::find($request->product_id)) {
            return false;
        }

        // If order exists, get it, otherwise create a new order
        $order = Order::find($request->order_id);
        if (!$order) {
            $order = new Order();
            if (auth()->check()) $order->user_id = auth()->user()->id;
            $order->save();
        }

        $orderItem = OrderItem::where('order_id', $order->id)->where('product_id', $request->product_id)->first();
        if (!$orderItem) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $request->product_id;
        }
        $orderItem->amount += $request->amount;
        $orderItem->save();

        return $orderItem;
    }
}
