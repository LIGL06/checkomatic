<?php

namespace CheckoMatic\Http\Controllers;

use Carbon\Carbon;
use CheckoMatic\Check;
use Illuminate\Http\Request;
use CheckMatic\Http\Requests\StoreCheck;


class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date = Carbon::now()->addWeek()->toDateString();
        $checks = Check::where('validUntil',Carbon::now()->toDateString());
        return view('checks.index')->with('checks',$checks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('checks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCheck $request)
    {
        $inputs = $request->all();
        $check = Check::create($inputs);
        $request->session()->flash('message','Cheque creado');
        return redirect()->action('CheckController@index');
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
    public function update(StoreCheck $request, $id)
    {
      $inputs = $request->all();
      $check = Check::find($id);
      $check->update($inputs);
      $request->session()->flash('message','Cheque actualizado');
      return redirect()->action('CheckController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $check = Check::find($id);
        $check->delete();
        $request->session()->flash('message','Cheque eliminado');
        return redirect()->action('CheckController@index');
    }
}
