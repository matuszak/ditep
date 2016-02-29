@extends('layouts.ditep.default')

@section('content')
    <?php
    $tiADD = strtoupper("Incluir novo cliente");
    $tiEDT = strtoupper("Editar cliente");
    $tiDEL = strtoupper("Apagar cliente (AtenÇÃo)");
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

    @if( (isset($acao)) and (isset($cliente)) )

        @if($acao == 'e')

            <h1><?php echo ($tiEDT); ?></h1><br>
            {!! Form::open( ['url' => "ditep/clientes/edt/$cliente->id", 'class' => 'form'] ) !!}

        @else

            <h1><?php echo ($tiDEL); ?></h1><br>
            {!! Form::open( ['url' => "ditep/clientes/del/$cliente->id", 'class' => 'form'] ) !!}
            <input type="hidden" name="confirma" value="true">

        @endif

    @else

        <h1><?php echo ($tiADD); ?></h1><br>
        {!! Form::open( ['url' => "ditep/clientes/add", 'class' => 'form'] ) !!}

        @endif

        <!--<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> -->
        {!! Form::label('Nome', 'Nome Completo') !!}{!! Form::text('nome', isset($cliente->nome) ? $cliente->nome : null, ['placeholder' => 'Nome completo do Cliente', 'class' => 'form-control'] ) !!}
        <br>{!! Form::label('Setor', 'Setor') !!}{!! Form::text('setor', isset($cliente->setor) ? $cliente->setor : null, ['placeholder' => 'Setor do Cliente', 'class' => 'form-control'] ) !!}
        <br>{!! Form::label('Matéria', 'Matéria') !!}{!! Form::text('materia', isset($cliente->materia) ? $cliente->materia : null, ['placeholder' => 'Matéria', 'class' => 'form-control'] ) !!}
        <br>{!! Form::label('Email', 'Email') !!}{!! Form::text('email', isset($cliente->email) ? $cliente->email : null, ['placeholder' => 'example@gmail.com', 'class' => 'form-control'] ) !!}
        <br>{!! Form::label('Fone', 'Telefone(1)') !!}{!! Form::text('fone', isset($cliente->fone) ? $cliente->fone : null, ['placeholder' => 'Telefone1', 'class' => 'form-control'] ) !!}
        <br>{!! Form::label('Fone', 'Telefone(2)') !!}{!! Form::text('fone2', isset($cliente->fone2) ? $cliente->fone2 : null, ['placeholder' => 'Telefone2 (opcional)', 'class' => 'form-control'] ) !!}


        <br>
        {!! Form::submit('Gravar', ['class' => 'btn btn-default']) !!}
        {!! Form::close() !!}

@endsection