<?php

namespace App\Http\Controllers\API;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Select2Controller extends Controller
{
  public function getRequired(Request $request)
  {
  $data = [];


      if($request->has('q')){
          $search = $request->q;
          $data = DB::table("required_files")
          ->select("id","name")
          ->where('name','LIKE',"%$search%")
          ->get();
      } else {
        $data = DB::table("required_files")
        ->get();
      }


      return response()->json($data);
  }

  public function getService(Request $request)
  {
  $data = [];


      if($request->has('q')){
          $search = $request->q;
          $data = DB::table("services")
          ->select("id","service_name")
          ->where('service_name','LIKE',"%$search%")
          ->get();
      } else {
        $data = DB::table("services")
        ->get();
      }


      return response()->json($data);
  }
}
