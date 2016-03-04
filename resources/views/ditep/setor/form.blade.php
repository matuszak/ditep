@extends('layouts.ditep.default')

@section('content')
    <?php
    $tiADD = strtoupper("Incluir novo setor");
    $tiEDT = strtoupper("Editar setor");
    $tiDEL = strtoupper("Apagar setor (AtenÇÃo)");
    ?>
    @if (count($errors) > 0)
        <div class="alert alert-danger" xmlns="http://www.w3.org/1999/html">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if( (isset($acao)) and (isset($setor)) )

        @if($acao == 'e')

            <h1 class="text-uppercase"><?php echo ($tiEDT); ?></h1><br>
            {!! Form::open( ['url' => "ditep/setores/edt/$setor->id", 'class' => 'form'] ) !!}

        @else

            <h1 class="text-uppercase"><font color="red"><?php echo ($tiDEL); ?></font></h1><br>
            {!! Form::open( ['url' => "ditep/setores/del/$setor->id", 'class' => 'form'] ) !!}
            <input type="hidden" name="confirma" value="true">

        @endif

    @else

        <h1 class="text-uppercase"><?php echo ($tiADD); ?></h1><br>
        {!! Form::open( ['url' => "ditep/setores/add", 'class' => 'form'] ) !!}

        @endif

        <!--<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> -->
        {!! Form::text('nome', isset($setor->nome) ? $setor->nome : null, ['placeholder' => 'Nome do Departamento/Setor', 'class' => 'form-control'] ) !!}
        <br>
        {!! Form::submit('Gravar', ['class' => 'btn btn-default']) !!}
        {!! Form::close() !!}

@endsection
