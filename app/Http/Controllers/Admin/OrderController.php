<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Order;
use App\Plate;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    // FROM orders, order_plate, plates WHERE user_id = 1
    {
        // $orders = Order::all();
        // dd($orders);
        $orders = DB::table("orders")
            ->select('orders.id', 'orders.totalPrice', 'orders.created_at', 'orders.updated_at')
            ->distinct()
            ->join('order_plate', 'orders.id', '=', 'order_plate.order_id')
            ->join('plates', 'plates.id', '=', 'order_plate.plate_id')
            ->where('user_id', Auth::user()->id)
            ->get();
        return view('admin.orders.index', ['orders' => $orders]);
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
        $validateData = $request->validate([
            'totalPrice' => 'required|numeric',
            'state_id' => 'required|exists:App\State,id',
        ]);

        $data = $request->all();
        $newOrder = new Order();
        $newOrder->fill($data);
        $newOrder->save();
        return redirect()->route('admin.orders.show', $newOrder->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $request = $order->id;
        $reqData = Order::find($request);
        $plates = $reqData->plates()->get();
        foreach($plates as $plate){
            $plate['quantity'] = $plate->pivot->quantity;
        }
        $data = [
            'order' => $order,
            'plates' => $plates,
        ];
        return view('admin.orders.show', $data);
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
    public function destroy(Order $order)
    {
        // if (Auth::user()->id != $order->user_id) {
        //     abort('403');
        // }
        
        $order->delete();

        return redirect()->route('admin.orders.index')->with('status', "Order id $order->id deleted");
    }
}
