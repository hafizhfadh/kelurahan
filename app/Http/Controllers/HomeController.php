<?php

namespace App\Http\Controllers;

use Charts;
use App\User;
use App\Models\Service;
use App\Models\PickupOrder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $services = Service::all();
      $orders = PickupOrder::all();
      $members = User::all();
      $method = Charts::database($orders, 'donut', 'highcharts')
                ->title("Order Status")
                ->responsive(true)
                ->groupBy('status');
        return view('welcome', compact('method', 'services', 'orders', 'members'));
    }

    public function home()
    {
        return view('home');
    }
}
