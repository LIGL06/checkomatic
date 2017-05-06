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
                            @foreach ($check as $key => $value)
                              Folio: <b>{{$value->folio}}</b><br>
                              Banco: <b>{{$value->bank}}</b><br>
                              Beneficiario: <b>{{$value->recipient}}</b><br>
                              Monto: $<b>{{$value->amount}}</b><br>
                              @if (Auth::user()->isAdmin())
                                <form action="{{action('CheckController@edit',$value->folio)}}" method="GET">
                                  {{ method_field('GET') }}
                                  {{ csrf_field() }}
                                  <input type="submit" class="btn btn-warning" value="Editar">
                                </form>
                                <form action="{{action('CheckController@destroy',$value->folio)}}" method="POST">
                                  {{ method_field('DELETE') }}
                                  {{ csrf_field() }}
                                  <input type="submit" class="btn btn-danger" value="Borrar">
                                </form>
                              @endif
                            @endforeach
                          </h5>
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
