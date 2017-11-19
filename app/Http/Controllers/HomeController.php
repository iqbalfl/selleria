<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only'=>['index', 'viewOrders']]);
        $this->middleware('role:customer', ['only' => 'viewOrders']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders')->count();
        $members = DB::table('users')->where('role','customer')->count();
        $products = DB::table('products')->count();
        $categories = DB::table('categories')->count();
        return view('home')->with(compact('orders','members','products','categories'));
    }

    public function viewOrders(Request $request)
    {
        $q = $request->get('q');
        $status = $request->get('status');
        $orders = auth()->user()->orders()
            ->where('id', 'LIKE', '%'. $q . '%')
            ->where('status', 'LIKE', '%' . $status . '%')
            ->orderBy('updated_at')
            ->paginate(5);
        return view('customer.view-orders')->with(compact('orders', 'q', 'status'));
    }
}
