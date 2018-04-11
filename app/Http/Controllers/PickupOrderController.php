<?php

namespace App\Http\Controllers;

use App\Libraries\Hafizh;
use App\Models\PickupOrder;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Events\PickupOrderEvent;

class PickupOrderController extends Controller
{
    public function orders()
    {
      $orders = PickupOrder::orderBy('name', 'DESC')->get();
      return Datatables::of($orders)
                        ->editColumn('status', function ($data){
                          return view('pickup_orders.status', compact('data'));
                        })
                        ->addColumn('options', function ($data){
                          return view('pickup_orders.button', compact('data'));
                        })
                        ->rawColumns(['options','status', 'name'])
                        ->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $orders = PickupOrder::orderBy('id', 'desc')->get();
        return view('pickup_orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $status = Hafizh::getEnumValues('pickup_orders','status');
      $method = Hafizh::getEnumValues('pickup_orders','action_method');
        return view('pickup_orders.create', compact('status', 'method'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = PickupOrder::created([
          'name' => $request->input('name'),
          'address' => $request->input('address'),
          'phone_number' => $request->input('phone_number'),
          'phone_number_now' => $request->input('phone_number_now'),
          'service_name' => $request->input('service_name'),
          'action_method' => $request->input('action_method'),
          'status' => $request->input('status')
        ]);

        return redirect()->back();

        event(new PickupOrderEvent(TRUE));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $order = PickupOrder::find($id);
        return view('pickup_orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $status = Hafizh::getEnumValues('pickup_orders','status');
      $method = Hafizh::getEnumValues('pickup_orders','action_method');
      $order = PickupOrder::find($id);
        return view('pickup_orders.edit', compact('status', 'method', 'order'));
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
      $order = PickupOrder::where('id', $id)->update([
        'name' => $request->input('name'),
        'address' => $request->input('address'),
        'phone_number' => $request->input('phone_number'),
        'phone_number_now' => $request->input('phone_number_now'),
        'service_name' => $request->input('service_name'),
        'action_method' => $request->input('action_method'),
        'status' => $request->input('status')
      ]);

      return redirect()->route('pickup_orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
       $order = PickupOrder::find($id);
       $order->delete();
       return redirect()->route('pickup_orders.index');
     }
}
