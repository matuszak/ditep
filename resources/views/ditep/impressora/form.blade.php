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
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@if( (isset($acao)) and (isset($impressora)) )
    @if($acao == 'e')
            <!-- AÇÃO DE EDITAR -->
        <h1 class="text-uppercase"><?php echo ($tiEDT); ?></h1><br>
        {!! Form::open( ['url' => "ditep/impressoras/edt/$impressora->id", 'class' => 'form'] ) !!}

        {!! Form::label('modelo', 'Modelo') !!}{!! Form::text('modelo', isset($impressora->modelo) ? $impressora->modelo : null, ['placeholder' => 'Modelo da impressora', 'class' => 'form-control'] ) !!}

        <br>
        <!--botao Editar -->
        {!! Form::submit('Editar', ['class' => 'btn btn-primary text-uppercase']) !!}
    @else
                <!-- AÇÃO DE DELETAR/APAGAR -->
        <h1 class="text-uppercase"><?php echo ($tiDEL); ?></h1><br>
        {!! Form::open( ['url' => "ditep/impressoras/del/$impressora->id", 'class' => 'form'] ) !!}
        <input type="hidden" name="confirma" value="true">

        {!! Form::label('modelo', 'Modelo') !!}{!! Form::text('modelo', isset($impressora->modelo) ? $impressora->modelo : null, ['placeholder' => 'Modelo da impressora', 'class' => 'form-control', 'disabled'] ) !!}

        <br>
        <input type="hidden" name="confirma" value="true">
        <!--botao Apagar -->
        {!! Form::submit('Apagar', ['class' => 'btn btn-danger text-uppercase']) !!}
    @endif

@else
                <!-- AÇÃO DE INCLUIR/ADICIONAR -->
        <h1 class="text-uppercase"><?php echo ($tiADD); ?></h1><br>
        {!! Form::open( ['url' => "ditep/impressoras/add", 'class' => 'form'] ) !!}

        {!! Form::label('modelo', 'Modelo') !!}{!! Form::text('modelo', isset($impressora->modelo) ? $impressora->modelo : null, ['placeholder' => 'Modelo da impressora', 'class' => 'form-control'] ) !!}

        <br>
        <!--botao Novo -->
        {!! Form::submit('Incluir', ['class' => 'btn btn-success text-uppercase']) !!}
@endif
    {!! Form::close() !!}

@endsection
