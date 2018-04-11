<?php

namespace App\Http\Controllers\API;

use App\Models\PickupOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PickupOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = PickupOrder::all();
        return $orders;
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
        return $order;
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
    }
}
