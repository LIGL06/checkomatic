<?php

namespace CheckoMatic\Http\Controllers;

use Carbon\Carbon;
use CheckoMatic\Check;
use Illuminate\Http\Request;
use CheckoMatic\Http\Requests\StoreCheck;


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
        $checks = Check::where('validUntil','<',$date)->get();
        $total = 0;
        foreach ($checks as $key => $value) {
           $total += $value->amount;
        }
        return view('checks.index')->with('checks',$checks)->with('total',$total)->with('date',$date);
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
    public function show(Request $request, $id)
    {
        $check = Check::where('folio',$id)->get();
        return view('checks.show')->with('check',$check);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showBy(Request $request, $id)
    {
        switch ($id) {
          case '1':
            $date = Carbon::now()->addWeek()->toDateString();
            $checks = Check::where('validUntil','<',$date)->get();
            $total = 0;
            foreach ($checks as $key => $value) {
               $total += $value->amount;
            }
            return view('checks.index')->with('checks',$checks)->with('total',$total)->with('date',$date);
            break;
          case '2':
            $date = Carbon::now()->toDateString();
            $checks = Check::where('validUntil','=',$date)->get();
            $total = 0;
            foreach ($checks as $key => $value) {
               $total += $value->amount;
            }
            return view('checks.index')->with('checks',$checks)->with('total',$total)->with('date',$date);
            break;
          case '3':
            $date = Carbon::now()->addDay()->toDateString();
            $checks = Check::where('validUntil','=',$date)->get();
            $total = 0;
            foreach ($checks as $key => $value) {
               $total += $value->amount;
            }
            return view('checks.index')->with('checks',$checks)->with('total',$total)->with('date',$date);
            break;
          case '4':
            $date = Carbon::now()->subWeek()->toDateString();
            $checks = Check::where('validUntil','>',$date)->where('validUntil','<',Carbon::now()->toDateString())->get();
            $total = 0;
            foreach ($checks as $key => $value) {
               $total += $value->amount;
            }
            return view('checks.index')->with('checks',$checks)->with('total',$total)->with('date',$date);
            break;
          case '5':
            $date = Carbon::now()->addWeek()->toDateString();
            $checks = Check::where('validUntil','>',Carbon::now())->where('validUntil','<=',$date)->get();
            $total = 0;
            foreach ($checks as $key => $value) {
               $total += $value->amount;
            }
            return view('checks.index')->with('checks',$checks)->with('total',$total)->with('date',$date);
            break;
          default:
            return 'Seleccione una opción del 1 al 5';
            break;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $check = Check::where('folio',$id)->get();
      return view('checks.edit')->with('check',$check);
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
      // return $request;
      $check = Check::where('folio',$id)->update([
        'bank' => $request->bank, 'recipient' => $request->recipient,
        'amount' => $request->amount, 'validUntil' => $request->validUntil
      ]);
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
        $check = Check::where('folio',$id)->delete();
        $request->session()->flash('message','Cheque eliminado');
        return redirect()->action('CheckController@index');
    }
}
