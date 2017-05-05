@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
      @endif
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Cheques</div>
                <div class="panel-body">
                  @foreach($checks as $key => $check)
                  <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <a href="catalog/show/{{$check['id']}}">
                      <h4 style="min-height:45px;margin:5px 0 10px 0">
                        
                      </h4>
                    </a>
                  </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
