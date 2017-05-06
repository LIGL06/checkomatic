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
                        <form action="{{action('CheckController@store')}}" method="post" style="display:inline">
                          {{ method_field('POST') }}
                          {{ csrf_field() }}
                          <div class="form-group">
                            <label for="bank">Banco</label>
                            <select class="form-control" name="bank">
                              <option value="">Seleccinar Banco</option>
                              <option value="BBVA Bancomer">BBVA Bancomer</option>
                              <option value="Banamex">Banamex</option>
                              <option value="Banorte">Banorte</option>
                              <option value="HSBC">HSBC</option>
                              <option value="Santander">Santender</option>
                              <option value="BanBajío">BanBajío</option>
                              <option value="ScotiaBank">ScotiaBank</option>
                              <option value="Otros">Otros</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="recipient">Beneficiario</label>
                            <input type="text" name="recipient" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="amount">Cantidad</label>
                            <input type="number" step="0.01" name="amount" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="validUntil">Fecha de Vencimiento</label>
                            <input type="date" name="validUntil" class="form-control">
                          </div>
                          <div class="row col-md-offset-10 col-xs-offset-10">
                            <input type="submit" class="btn btn-success" value="Guardar">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
