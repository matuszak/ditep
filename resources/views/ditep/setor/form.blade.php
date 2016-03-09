@extends('layouts.ditep.default')

@section('content')
    <?php
    $tiADD = strtoupper("Incluir novo setor");
    $tiEDT = strtoupper("Editar setor");
    $tiDEL = strtoupper("<h1><font color='red'>Apagar setor (AtenÇÃo)</font></h1>");
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
                <!-- AÇÃO DE EDITAR -->
            <h1 class="text-uppercase"><?php echo ($tiEDT); ?></h1><br>

            {!! Form::open( ['url' => "ditep/setores/edt/$setor->id", 'class' => 'form'] ) !!}

            {!! Form::label('nome', 'Nome') !!}{!! Form::text('nome', isset($setor->nome) ? $setor->nome : null, ['placeholder' => 'Print Model', 'class' => 'form-control'] ) !!}
            <br>
            <!--botao Editar -->
            {!! Form::submit('Editar', ['class' => 'btn btn-primary text-uppercase']) !!}
        @else
                    <!-- AÇÃO DE DELETAR/APAGAR -->
            <h1 class="text-uppercase"><?php echo ($tiDEL); ?><br>
            {!! Form::open( ['url' => "ditep/setores/del/$setor->id", 'class' => 'form'] ) !!}
            <input type="hidden" name="confirma" value="true">

                {!! Form::label('nome', 'Nome') !!}{!! Form::text('nome', isset($setor->nome) ? $setor->nome : null, ['placeholder' => 'Print Model', 'class' => 'form-control', 'disabled'] ) !!}
            <br>
            <input type="hidden" name="confirma" value="true">
            <!--botao Apagar -->
            {!! Form::submit('Apagar', ['class' => 'btn btn-danger text-uppercase']) !!}
        @endif
    @else
                <!-- AÇÃO DE INCLUIR/ADICIONAR -->
        <h1 class="text-uppercase"><?php echo ($tiADD); ?></h1><br>
        {!! Form::open( ['url' => "ditep/setores/add", 'class' => 'form'] ) !!}
        {!! Form::label('nome', 'Nome') !!}{!! Form::text('nome', isset($setor->nome) ? $setor->nome : null, ['placeholder' => 'Nome para o setor', 'class' => 'form-control'] ) !!}
        <br>
        <!--botao Novo -->
        {!! Form::submit('Incluir', ['class' => 'btn btn-success text-uppercase']) !!}
    @endif

    {!! Form::close() !!}
@endsection
