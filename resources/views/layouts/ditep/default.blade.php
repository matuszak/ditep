<!DOCTYPE html>
  <html lang="pt-br">
    <head>
      <meta charset="utf-8">
      <title class="text-uppercase">{{ $titulo or 'DITEP - Departamento de impressão de trabalhos escolares de professores' }}</title>

      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{ url('assets/css/font-awesome.min.css') }}" >
      <!-- Optional theme -->
      <link rel="stylesheet" href="{{ url('assets/css/bootstrap-theme.min.css') }}">
    </head>

    <body>
      @section('sidebar')
      @include('includes.menu')
      @show

      <div class="container">
        @yield('content')
      </div>
      <!-- jQuery JavaScript -->
      <link rel="javascript" href="{{url('assets/js/jquery-2.2.2.min.js') }}">
      <!-- bootstrap JavaScript -->
      <link rel="javascript" href="{{url('assets/js/bootstrap.min.js') }}">
    </body>

    @section('footer')
    @show
  </html>
