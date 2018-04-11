<?php

namespace App\Http\Controllers;

use App\Models\RequiredFile;
use Illuminate\Http\Request;

class RequiredFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $required_files = RequiredFile::all();
        return view('required_files.index',  compact('required_files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $required_files = RequiredFile::create([
          'name' => $request->input('name'),
        ]);
        return redirect()->route('required_files.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $required_files = RequiredFile::find($id);
        $required_files->delete();
        return redirect()->route('required_files.index');
    }
}
