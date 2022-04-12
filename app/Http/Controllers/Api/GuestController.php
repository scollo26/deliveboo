<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Guest;
use App\Order;
use App\Plate;

class GuestController extends Controller
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

        $data = $request->all();

        $data = $data['data'];
        
        $validate = $request->validate([
            'data.guest.firstname'=> 'required',
            'data.guest.lastname'=> 'required',
            'data.guest.address'=> 'required',
            'data.guest.email'=> 'required|email',
            'data.guest.phoneNumber'=> 'required',
            'data.infocart.cart'=> 'required',
            'data.price.totalPrice'=> 'required',
        ]);

        $dataOrder = $data['infocart'];
        $order = $data['price'];
        $plates = $dataOrder['cart'];
        $newOrder = new Order();
        $newOrder->fill($order);
        $newOrder->state_id = 1;  
        $newOrder->save();
        
        foreach ($plates as $plate) {
            $newOrder->plates()->attach(Plate::find($plate['id']), ['quantity'=> $plate['quantity']]);
        }

        $dataGuest = $data['guest'];
        $newGuest = new Guest();
        $newGuest->fill($dataGuest);
        $newGuest->order_id = $newOrder->id; 
        $newGuest->save();
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
}
