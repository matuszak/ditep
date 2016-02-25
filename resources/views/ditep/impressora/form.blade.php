@extends('layouts.ditep.default')

@section('content')
<?php
  $tiADD = strtoupper("Incluir nova impressora");
  $tiEDT = strtoupper("Editar impressora");
  $tiDEL = strtoupper("Apagar impressora (AtenÇÃo)");
?>
@if (count($errors) > 0)
<div class="alert alert-danger">
  <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
  </ul>
</div>
@endif

@if( (isset($acao)) and (isset($impressora)) )

  @if($acao == 'e')

    <h1><?php echo ($tiEDT); ?></h1><br>
  {!! Form::open( ['url' => "ditep/impressoras/edt/$impressora->id"] ) !!}

  @else

    <h1><?php echo ($tiDEL); ?></h1><br>
  {!! Form::open( ['url' => "ditep/impressoras/del/$impressora->id"] ) !!}
    <input type="hidden" name="confirma" value="true">

  @endif

@else

  <h1><?php echo ($tiADD); ?></h1><br>
  {!! Form::open( ['url' => "ditep/impressoras/add"] ) !!}

@endif

    <!--<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> -->
    {!! Form::text('modelo', isset($impressora->modelo) ? $impressora->modelo : null, ['placeholder' => 'Print Model'] ) !!}
    {!! Form::submit('Gravar', ['class' => 'btn-success']) !!}
  {!! Form::close() !!}

@endsection
