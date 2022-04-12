<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Plate;
use App\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $plates = Plate::orderBy('created_at', 'desc')->limit(5)->get();
        $orders = Order::orderBy('created_at', 'desc')->limit(5)->get();
        return view('admin.home', ['plates' => $plates, 'orders'=> $orders]);

    }
}

