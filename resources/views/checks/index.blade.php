@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
      @endif
      <div class="col-md-10 col-md-offset-1">
        Filtrar por Fecha:
        <div class="row">
          <div class="col-xs-3 col-md-2">
            <a href="{{action('CheckController@showBy','1')}}">Esta semana</a>
          </div>
          <div class="col-xs-3 col-md-2">
            <a href="{{action('CheckController@showBy','2')}}">Hoy</a>
          </div>
          <div class="col-xs-3 col-md-2">
            <a href="{{action('CheckController@showBy','3')}}">Mañana</a>
          </div>
          <div class="col-xs-3 col-md-2">
            <a href="{{action('CheckController@showBy','4')}}">Semana pasada</a>
          </div>
          <div class="col-xs-3 col-md-2">
            <a href="{{action('CheckController@showBy','5')}}">Semana entrante</a>
          </div>
        </div>
      </div>
      <div class="col-md-10 col-md-offset-1">
        Filtrar por Nombre:
        <div class="row">
          <div class="col-xs-3 col-md-2">
            <a href="{{action('CheckController@showName','1')}}">A-Z</a>
          </div>
          <div class="col-xs-3 col-md-2">
            <a href="{{action('CheckController@showName','2')}}">Z-A</a>
          </div>
          <div class="col-xs-3 col-md-3">
            <div class="row">
              {{ Form::open(['url' => '/checks/names/3', 'method' => 'GET']) }}
              {{ Form::text('recipient','Nombre', ['class' => 'form-control']) }}
              {{ Form::close() }}
            </div>
          </div>
        </div>
      </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Cheques a vencer antes del <b>{{$date}}</b></div>
                <div class="panel-body">
                  @foreach($checks as $key => $check)
                  <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <h5>
                      Banco: <b>{{$check->bank}}</b><br>
                      Beneficiario: <b>{{$check->recipient}}</b><br>
                      Vencimiento: <b>{{$check->validUntil}}</b>
                      Cantidad: <b>${{ $check->amount }}</b>
                      <br>
                      <a href="/checks/{{$check->id}}">
                        <p style="display:inline-block">
                          Folio: {{ $check->folio }}
                        </h4>
                      </a>
                    </h5>
                  </div>
                  @endforeach
                </div>
            </div>
            <div class="container">

            </div>
            <div class="panel panel-default">
              <div class="panel-heading">Resumen de fecha</div>
              <div class="panel-body">
                <h5>Cantidad total de cheques: <b>${{ $total}}</b></h5>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
