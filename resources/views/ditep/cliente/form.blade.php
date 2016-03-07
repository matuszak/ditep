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
        <!-- AÇÃO DE EDITAR -->
            <h1 class="text-uppercase"><?php echo ($tiEDT); ?></h1><br>
            {!! Form::open( ['url' => "ditep/clientes/edt/$cliente->id", 'class' => 'form'] ) !!}

            {!! Form::label('Nome', 'Nome Completo') !!}{!! Form::text('nome', isset($cliente->nome) ? $cliente->nome : null, ['placeholder' => 'Nome completo do Cliente', 'class' => 'form-control'] ) !!}
            <br>{!! Form::label('id_setor', 'Selecione um setor') !!} {!! Form::select('id_setor', $setores, isset($cliente->id_setor) ? $cliente->id_setor : null, ['class' => 'form-control', 'aria-describeby' => 'helpBlock1']) !!}
            <span id="helpBlock1" class="help-block">{{ Html::link ('ditep/setores', 'Setor não encontrado? Clique aqui e adicione a lista!') }}</span>
            <br>{!! Form::label('Matéria', 'Matéria') !!}{!! Form::text('materia', isset($cliente->materia) ? $cliente->materia : null, ['placeholder' => 'Matéria', 'class' => 'form-control'] ) !!}
            <br>{!! Form::label('Email', 'E-mail') !!}{!! Form::text('email', isset($cliente->email) ? $cliente->email : null, ['placeholder' => 'example@gmail.com', 'class' => 'form-control'] ) !!}
            <br>{!! Form::label('Fone', 'Telefone(1)') !!}{!! Form::text('fone', isset($cliente->fone) ? $cliente->fone : null, ['placeholder' => 'Telefone1', 'class' => 'form-control'] ) !!}
            <br>{!! Form::label('Fone', 'Telefone(2)') !!}{!! Form::text('fone2', isset($cliente->fone2) ? $cliente->fone2 : null, ['placeholder' => 'Telefone2 (opcional)', 'class' => 'form-control'] ) !!}
            <br>
                    <!--botao Editar -->
            {!! Form::submit('Editar', ['class' => 'btn btn-primary text-uppercase']) !!}
        @else
        <!-- AÇÃO DE DELETAR/APAGAR -->
            <h1 class="text-uppercase"><?php echo ($tiDEL); ?></h1><br>
            {!! Form::open( ['url' => "ditep/clientes/del/$cliente->id", 'class' => 'form'] ) !!}

            {!! Form::label('Nome', 'Nome Completo') !!}{!! Form::text('nome', isset($cliente->nome) ? $cliente->nome : null, ['placeholder' => 'Nome completo do Cliente', 'class' => 'form-control', 'disabled'] ) !!}
            <br>{!! Form::label('id_setor', 'Selecione um setor') !!} {!! Form::select('id_setor', $setores, isset($cliente->id_setor) ? $cliente->id_setor : null, ['class' => 'form-control', 'aria-describeby' => 'helpBlock1', 'disabled']) !!}
            <span id="helpBlock1" class="help-block">{{ Html::link ('ditep/setores', 'Setor não encontrado? Clique aqui e adicione a lista!') }}</span>
            <br>{!! Form::label('Matéria', 'Matéria') !!}{!! Form::text('materia', isset($cliente->materia) ? $cliente->materia : null, ['placeholder' => 'Matéria', 'class' => 'form-control', 'disabled'] ) !!}
            <br>{!! Form::label('Email', 'E-mail') !!}{!! Form::text('email', isset($cliente->email) ? $cliente->email : null, ['placeholder' => 'example@gmail.com', 'class' => 'form-control', 'disabled'] ) !!}
            <br>{!! Form::label('Fone', 'Telefone(1)') !!}{!! Form::text('fone', isset($cliente->fone) ? $cliente->fone : null, ['placeholder' => 'Telefone1', 'class' => 'form-control', 'disabled'] ) !!}
            <br>{!! Form::label('Fone', 'Telefone(2)') !!}{!! Form::text('fone2', isset($cliente->fone2) ? $cliente->fone2 : null, ['placeholder' => 'Telefone2 (opcional)', 'class' => 'form-control', 'disabled'] ) !!}
            <br>
            <input type="hidden" name="confirma" value="true">
            <!--botao Apagar -->
            {!! Form::submit('Apagar', ['class' => 'btn btn-danger text-uppercase']) !!}
        @endif
    @else
    <!-- AÇÃO DE INCLUIR/ADICIONAR -->
        <h1 class="text-uppercase"><?php echo ($tiADD); ?></h1><br>
        {!! Form::open( ['url' => "ditep/clientes/add", 'class' => 'form'] ) !!}

        {!! Form::label('Nome', 'Nome Completo') !!}{!! Form::text('nome', isset($cliente->nome) ? $cliente->nome : null, ['placeholder' => 'Nome completo do Cliente', 'class' => 'form-control'] ) !!}
        <br>{!! Form::label('id_setor', 'Selecione um setor') !!} {!! Form::select('id_setor', $setores, isset($cliente->id_setor) ? $cliente->id_setor : null, ['class' => 'form-control', 'aria-describeby' => 'helpBlock1']) !!}
        <span id="helpBlock1" class="help-block">{{ Html::link ('ditep/setores', 'Setor não encontrado? Clique aqui e adicione a lista!') }}</span>
        <br>{!! Form::label('Matéria', 'Matéria') !!}{!! Form::text('materia', isset($cliente->materia) ? $cliente->materia : null, ['placeholder' => 'Matéria', 'class' => 'form-control'] ) !!}
        <br>{!! Form::label('Email', 'E-mail') !!}{!! Form::text('email', isset($cliente->email) ? $cliente->email : null, ['placeholder' => 'example@gmail.com', 'class' => 'form-control'] ) !!}
        <br>{!! Form::label('Fone', 'Telefone(1)') !!}{!! Form::text('fone', isset($cliente->fone) ? $cliente->fone : null, ['placeholder' => 'Telefone1', 'class' => 'form-control'] ) !!}
        <br>{!! Form::label('Fone', 'Telefone(2)') !!}{!! Form::text('fone2', isset($cliente->fone2) ? $cliente->fone2 : null, ['placeholder' => 'Telefone2 (opcional)', 'class' => 'form-control'] ) !!}
        <br>
        <!--botao Novo -->
        {!! Form::submit('Incluir', ['class' => 'btn btn-success text-uppercase']) !!}
    @endif
        {!! Form::close() !!}
@endsection
