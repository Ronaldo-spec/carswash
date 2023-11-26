<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\orderDetail;
use App\Models\Jenis;
use App\Models\User;
use Auth;
use Alert;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$orders = Order::where('user_id', Auth::user()->id)->where('status', '!=',0)->get();

    	return view('history.index', compact('orders'));
    }

    public function detail($id)
    {
    	$order = Order::where('id', $id)->first();
    	$orderDetail = orderDetail::where('order_id', $order->id)->get();

     	return view('history.detail', compact('order','orderDetail'));
    }
}
