@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Vas a crear <b>un cheque</b></div>
                <div class="panel-body">
                    <div class="row">
                      <div class="col-xs-12 col-md-12">
                        {!! Html::ul($errors->all()) !!}
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                          <h5>
                              Folio: <b>{{$check->folio}}</b><br>
                              Banco: <b>{{$check->bank}}</b><br>
                              Beneficiario: <b>{{$check->recipient}}</b><br>
                              Monto: $<b>{{$check->amount}}</b><br>
                          </h5>
                          @if (Auth::user()->isAdmin())
                            <div class="col-xs-6 col-md-6">
                              <form action="{{action('CheckController@edit',$check->id)}}" method="GET">
                                <input type="submit" class="btn btn-warning" value="Editar">
                              </form>
                            </div>
                            <div class="col-xs-6 col-md-6">
                              <form action="{{action('CheckController@destroy',$check->id)}}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-danger" value="Borrar">
                              </form>
                            </div>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
