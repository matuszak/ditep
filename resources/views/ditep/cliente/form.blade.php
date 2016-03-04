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

            <h1 class="text-uppercase"><?php echo ($tiEDT); ?></h1><br>
            {!! Form::open( ['url' => "ditep/clientes/edt/$cliente->id", 'class' => 'form'] ) !!}

        @else

            <h1 class="text-uppercase"><?php echo ($tiDEL); ?></h1><br>
            {!! Form::open( ['url' => "ditep/clientes/del/$cliente->id", 'class' => 'form'] ) !!}
            <input type="hidden" name="confirma" value="true">

        @endif

    @else

        <h1 class="text-uppercase"><?php echo ($tiADD); ?></h1><br>
        {!! Form::open( ['url' => "ditep/clientes/add", 'class' => 'form'] ) !!}

    @endif

        <!--<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> -->
        {!! Form::label('Nome', 'Nome Completo') !!}{!! Form::text('nome', isset($cliente->nome) ? $cliente->nome : null, ['placeholder' => 'Nome completo do Cliente', 'class' => 'form-control'] ) !!}
        <br>{!! Form::label('id_setor', 'Selecione um setor') !!}
        <select name="id_setor" class="form-control">
        @foreach ($setores as $setor)
           <option value="{{ isset($cliente->id_setor) ? $cliente->id_setor : $setor->id }}">{{ $setor->nome }}</option>
        @endforeach
        </select>
        {{ Html::link ('ditep/setores', 'Setor não encontrado? Clique aqui e adicione a lista!') }}
          <!--  {!! Form::select('id_setor',$setores, array('class' => 'form-control')) !!} -->
        <br>{!! Form::label('Matéria', 'Matéria') !!}{!! Form::text('materia', isset($cliente->materia) ? $cliente->materia : null, ['placeholder' => 'Matéria', 'class' => 'form-control'] ) !!}
        <br>{!! Form::label('Email', 'E-mail') !!}{!! Form::text('email', isset($cliente->email) ? $cliente->email : null, ['placeholder' => 'example@gmail.com', 'class' => 'form-control'] ) !!}
        <br>{!! Form::label('Fone', 'Telefone(1)') !!}{!! Form::text('fone', isset($cliente->fone) ? $cliente->fone : null, ['placeholder' => 'Telefone1', 'class' => 'form-control'] ) !!}
        <br>{!! Form::label('Fone', 'Telefone(2)') !!}{!! Form::text('fone2', isset($cliente->fone2) ? $cliente->fone2 : null, ['placeholder' => 'Telefone2 (opcional)', 'class' => 'form-control'] ) !!}

        <br>

        <!--Botoes personalizados -->
        @if( (isset($acao)) and (isset($cliente)) )

            @if($acao == 'e')

                {!! Form::submit('Editar', ['class' => 'btn btn-default']) !!}

            @else

                {!! Form::submit('Apagar', ['class' => 'btn btn-default']) !!}

            @endif

        @else

            {!! Form::submit('Gravar', ['class' => 'btn btn-default']) !!}

        @endif
        {!! Form::close() !!}

@endsection
