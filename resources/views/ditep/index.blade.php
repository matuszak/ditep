@extends('layouts.ditep.default')

@section('content')
  <p>Dashboard da aplicação,</p>
  {!! Form::open(array('url' => 'teste/#')) !!}
  {!! Form::close() !!}
@endsection

@section('footer')
  <!-- <p>Final da página</p> -->
@endsection
