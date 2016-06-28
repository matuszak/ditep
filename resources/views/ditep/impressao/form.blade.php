@extends('layouts.ditep.default')

@section('content')
    <?php
    $tiADD = strtoupper("Incluir nova impressão");
    $tiEDT = strtoupper("Editar impressão");
    $tiDEL = strtoupper("Apagar impressão (AtenÇÃo)");
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

    @if( (isset($acao)) and (isset($impressao)) )
        @if($acao == 'e')
        <!-- AÇÃO DE EDITAR -->
            <h1 class="text-uppercase"><?php echo ($tiEDT); ?></h1><br>
            {!! Form::open( ['url' => "ditep/impressoes/edt/$impressao->id", 'class' => 'form'] ) !!}


        <!--Solicita e Lista as impressoras cadastradas -->
<?php
       // {!! Form::label('id_impressora', 'Impressora') !!}
       // {!! Form::select(('id_impressora'), $impressoras, isset($impressao->id_impressora) ? $impressao->id_impressora : null, ['class' => 'form-control text-uppercase', 'aria-describeby' => 'helpBlock1'] ) !!}
       // <br>

      //  <!-- Solicita lista Toners cadastrados -->
       // {!! Form::label('id_toner', 'Toner') !!}
       // {!! Form::select(('id_toner'), $toners, isset($impressao->id_toner) ? $impressao->id_toner : null, ['class' => 'form-control text-uppercase', 'aria-describeby' => 'helpBlock1'] ) !!}
       // <br>
      ?>

        <!-- Solicita e lista os clientes previamente cadastrados -->
        {!! Form::label('id_cliente', 'Cliente') !!}
        {!! Form::select('id_cliente', $clientes, isset($impressao->id_cliente) ? $impressao->id_cliente : null, ['class' => 'form-control text-uppercase', 'aria-describeby' => 'helpBlock1']) !!}
        <span id="helpBlock1" class="help-block">{{ Html::link ('ditep/cliente', 'Cliente não encontrado? Clique aqui e adicione a lista!') }} </span>
        <br>

        <!-- Solicita se é frente e verso, padrão não ser frente e verso -->
        {!! Form::label('imp_fv', 'Frente e verso?') !!}<br>
        Não {!! Form::radio('imp_fv', 0, true, isset($impressao->imp_fv) ? $impressao->imp_fv : null, ['']) !!}
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Sim {!! Form::radio('imp_fv', 1, isset($impressao->imp_fv) ? $impressao->imp_fv : null, ['']) !!}
        <br>
        <br>

        <!-- Solicita e numero de laudas -->
        {!! Form::label('imp_laudas', 'Laudas (caso seja frente e verso)') !!}
        {!! Form::select('imp_laudas',
                [
                    1 => 1,
                    2 => 2,
                    3 => 3,
                    4 => 4,
                    5 => 5,
                    6 => 6,
                    7 => 7,
                    8 => 8,
                    9 => 9,
                    10 => 10,
                    11 => 11,
                    12 => 12,
                    13 => 13,
                    14 => 14,
                    15 => 15,
                    16 => 16,
                    17 => 17,
                    18 => 18,
                    19 => 19,
                    20 => 20,
                    21 => 21,
                    22 => 22,
                    23 => 23,
                    24 => 24,
                    25 => 25,
                    26 => 26,
                    27 => 27,
                    28 => 28,
                    29 => 29,
                    30 => 30,
                    31 => 31,
                    32 => 32,
                    33 => 33,
                    34 => 34,
                    35 => 35,
                    36 => 36,
                    37 => 37,
                    38 => 38,
                    39 => 39,
                    40 => 40,
                ], isset($impressao->imp_laudas) ? $impressao->imp_laudas : 1, ['class' => 'form-control text-uppercase', 'aria-describeby' => 'helpBlock1']) !!}
        <span id="helpBlock1" class="help-block">{{ 'Caso seja apenas 1 (uma) cópia, ignore este campo deixe o cursor em: 1 (um) número padrão'}} </span>
        <br>

        <!-- Solicita tipo de arquivo a ser impresso -->
        {!! Form::label('imp_tipo', 'Tipo de atividade') !!}
        {!! Form::select('imp_tipo', ["AT. ESCOLAR" => "ATIVIDADE ESCOLAR", "ADMINISTRATIVO" => "ADMINISTRATIVO", "OUTROS" => "OUTRO", "PARTICULAR" => "PARTICULAR", "PROVAS" => "PROVA"], isset($impressao->imp_tipo) ? $impressao->imp_tipo : null, ['class' => 'form-control']) !!}
        <BR>

        <!-- Solicita modo de impressão -->
        {!! Form::label('imp_modo', 'Modo de impressão') !!}
        {!! Form::select('imp_tipo', ["ECONÔMICO" => "ECONÔMICO", "NORMAL" => "NORMAL", "SUPER DENSIDADE" => "SUPER DENSIDADE"], isset($impressao->imp_modo) ? $impressao->imp_modo : null, ['class' => 'form-control']) !!}
        <BR>

        <!-- Solicita quantidade de cópias feitas -->
        {!! Form::label('imp_quantidade', 'Quantidade de impressões realizadas') !!}
        {!! Form::text('imp_quantidade', isset($impressao->imp_quantidade) ? $impressao->imp_quantidade : null, ['placeholder' => 'número de cópias realizadas', 'class' => 'form-control'] ) !!}
        <br>

        <!-- Resgata data atual em php -->
        <?php $dataAtual = date('Y-m-d'); ?>

                <!-- Solicita a data de impressão -->
        {!! Form::label('imp_data', 'Data que ocorreu essa impressão') !!}
        {!! Form::text('imp_data', isset($impressao->imp_data) ? $impressao->imp_data : $dataAtual, ['class' => 'form-control',] ) !!}
        <br>
        <br>

           <br>
                    <!--botao Editar -->
            {!! Form::submit('Editar', ['class' => 'btn btn-primary text-uppercase']) !!}
        @else
        <!-- AÇÃO DE DELETAR/APAGAR -->
            <h1 class="text-uppercase"><?php echo ($tiDEL); ?></h1><br>
            {!! Form::open( ['url' => "ditep/impressoes/del/$impressao->id", 'class' => 'form'] ) !!}
                    <!--Solicita e Lista as impressoras cadastradas -->
        {!! Form::label('id_impressora', 'Impressora') !!}
        {!! Form::select(('id_impressora'), $impressoras, isset($impressao->id_impressora) ? $impressao->id_impressora : null, ['class' => 'form-control text-uppercase', 'aria-describeby' => 'helpBlock1'] ) !!}
        <br>

        <!-- Solicita lista Toners cadastrados -->
        {!! Form::label('id_toner', 'Toner') !!}
        {!! Form::select(('id_toner'), $toners, isset($impressao->id_toner) ? $impressao->id_toner : null, ['class' => 'form-control text-uppercase', 'aria-describeby' => 'helpBlock1'] ) !!}
        <br>

        <!-- Solicita e lista os clientes previamente cadastrados -->
        {!! Form::label('id_cliente', 'Cliente') !!}
        {!! Form::select('id_cliente', $clientes, isset($impressao->id_cliente) ? $impressao->id_cliente : null, ['class' => 'form-control text-uppercase', 'aria-describeby' => 'helpBlock1']) !!}
        <span id="helpBlock1" class="help-block">{{ Html::link ('ditep/cliente', 'Cliente não encontrado? Clique aqui e adicione a lista!') }} </span>
        <br>

        <!-- Solicita se é frente e verso, padrão não ser frente e verso -->
        {!! Form::label('imp_fv', 'Frente e verso?') !!}<br>
        Não {!! Form::radio('imp_fv', 0, true, isset($impressao->imp_fv) ? $impressao->imp_fv : null, ['']) !!}
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Sim {!! Form::radio('imp_fv', 1, isset($impressao->imp_fv) ? $impressao->imp_fv : null, ['']) !!}
        <br>
        <br>

        <!-- Solicita e numero de laudas -->
        {!! Form::label('imp_laudas', 'Laudas (caso seja frente e verso)') !!}
        {!! Form::select('imp_laudas',
                [
                    1 => 1,
                    2 => 2,
                    3 => 3,
                    4 => 4,
                    5 => 5,
                    6 => 6,
                    7 => 7,
                    8 => 8,
                    9 => 9,
                    10 => 10,
                    11 => 11,
                    12 => 12,
                    13 => 13,
                    14 => 14,
                    15 => 15,
                    16 => 16,
                    17 => 17,
                    18 => 18,
                    19 => 19,
                    20 => 20,
                    21 => 21,
                    22 => 22,
                    23 => 23,
                    24 => 24,
                    25 => 25,
                    26 => 26,
                    27 => 27,
                    28 => 28,
                    29 => 29,
                    30 => 30,
                    31 => 31,
                    32 => 32,
                    33 => 33,
                    34 => 34,
                    35 => 35,
                    36 => 36,
                    37 => 37,
                    38 => 38,
                    39 => 39,
                    40 => 40,
                ], isset($impressao->imp_laudas) ? $impressao->imp_laudas : 1, ['class' => 'form-control text-uppercase', 'aria-describeby' => 'helpBlock1']) !!}
        <span id="helpBlock1" class="help-block">{{ 'Caso seja apenas 1 (uma) cópia, ignore este campo deixe o cursor em: 1 (um) número padrão'}} </span>
        <br>

        <!-- Solicita tipo de arquivo a ser impresso -->
        {!! Form::label('imp_tipo', 'Tipo de atividade') !!}
        {!! Form::select('imp_tipo', ["AT. ESCOLAR" => "ATIVIDADE ESCOLAR", "ADMINISTRATIVO" => "ADMINISTRATIVO", "OUTROS" => "OUTRO", "PARTICULAR" => "PARTICULAR", "PROVAS" => "PROVA"], isset($impressao->imp_tipo) ? $impressao->imp_tipo : null, ['class' => 'form-control']) !!}
        <BR>

        <!-- Solicita modo de impressão -->
        {!! Form::label('imp_modo', 'Modo de impressão') !!}
        {!! Form::select('imp_tipo', ["ECONÔMICO" => "ECONÔMICO", "NORMAL" => "NORMAL", "SUPER DENSIDADE" => "SUPER DENSIDADE"], isset($impressao->imp_modo) ? $impressao->imp_modo : null, ['class' => 'form-control']) !!}
        <BR>

        <!-- Solicita quantidade de cópias feitas -->
        {!! Form::label('imp_quantidade', 'Quantidade de impressões realizadas') !!}
        {!! Form::text('imp_quantidade', isset($impressao->imp_quantidade) ? $impressao->imp_quantidade : null, ['placeholder' => 'número de cópias realizadas', 'class' => 'form-control'] ) !!}
        <br>

        <!-- Resgata data atual em php -->
        <?php $dataAtual = date('Y-m-d'); ?>

                <!-- Solicita a data de impressão -->
        {!! Form::label('imp_data', 'Data que ocorreu essa impressão') !!}
        {!! Form::text('imp_data', isset($impressao->imp_data) ? $impressao->imp_data : $dataAtual, ['class' => 'form-control', 'disabled'] ) !!}
        <br>
        <br>

            <br>
            <input type="hidden" name="confirma" value="true">
            <!--botao Apagar -->
            {!! Form::submit('Apagar', ['class' => 'btn btn-danger text-uppercase']) !!}
        @endif
    @else
    <!-- AÇÃO DE INCLUIR/ADICIONAR -->
        <h1 class="text-uppercase"><?php echo ($tiADD); ?></h1><br>
        {!! Form::open( ['url' => "ditep/impressoes/add", 'class' => 'form'] ) !!}

        <?php
        // {!! Form::label('id_impressora', 'Impressora') !!}
        // {!! Form::select(('id_impressora'), $impressoras, isset($impressao->id_impressora) ? $impressao->id_impressora : null, ['class' => 'form-control text-uppercase', 'aria-describeby' => 'helpBlock1'] ) !!}
        // <br>

        //  <!-- Solicita lista Toners cadastrados -->
        // {!! Form::label('id_toner', 'Toner') !!}
        // {!! Form::select(('id_toner'), $toners, isset($impressao->id_toner) ? $impressao->id_toner : null, ['class' => 'form-control text-uppercase', 'aria-describeby' => 'helpBlock1'] ) !!}
        // <br>
        ?>

        <!-- solicitar lista de impressoras e toners tentativas -->
        {!! Form::label('id_impressora', 'Toner e Impressora') !!}
        <select name="id_toner" id="id_toner">
            @foreach ($tons as $ton)
                <option value="{{ $ton->id }}">{{ $ton->dia_recarga }} - {{ $ton->getImpressoraModelo() }}</option>

            @endforeach
        </select>
<br><br>

        <!-- Solicita e lista os clientes previamente cadastrados -->
        {!! Form::label('id_cliente', 'Cliente') !!}
        {!! Form::select('id_cliente', $clientes, isset($impressao->id_cliente) ? $impressao->id_cliente : null, ['class' => 'form-control text-uppercase', 'aria-describeby' => 'helpBlock1']) !!}
          <span id="helpBlock1" class="help-block">{{ Html::link ('ditep/cliente', 'Cliente não encontrado? Clique aqui e adicione a lista!') }} </span>
        <br>

        <!-- Solicita se é frente e verso, padrão não ser frente e verso -->
        {!! Form::label('imp_fv', 'Frente e verso?') !!}<br>
        Não {!! Form::radio('imp_fv', 0, true, isset($impressao->imp_fv) ? $impressao->imp_fv : null, ['']) !!}
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Sim {!! Form::radio('imp_fv', 1, isset($impressao->imp_fv) ? $impressao->imp_fv : null, ['']) !!}
        <br>
        <br>

        <!-- Solicita e numero de laudas -->
        {!! Form::label('imp_laudas', 'Laudas (caso seja frente e verso)') !!}
        {!! Form::select('imp_laudas',
                [
                    1 => 1,
                    2 => 2,
                    3 => 3,
                    4 => 4,
                    5 => 5,
                    6 => 6,
                    7 => 7,
                    8 => 8,
                    9 => 9,
                    10 => 10,
                    11 => 11,
                    12 => 12,
                    13 => 13,
                    14 => 14,
                    15 => 15,
                    16 => 16,
                    17 => 17,
                    18 => 18,
                    19 => 19,
                    20 => 20,
                    21 => 21,
                    22 => 22,
                    23 => 23,
                    24 => 24,
                    25 => 25,
                    26 => 26,
                    27 => 27,
                    28 => 28,
                    29 => 29,
                    30 => 30,
                    31 => 31,
                    32 => 32,
                    33 => 33,
                    34 => 34,
                    35 => 35,
                    36 => 36,
                    37 => 37,
                    38 => 38,
                    39 => 39,
                    40 => 40,
                ], isset($impressao->imp_laudas) ? $impressao->imp_laudas : 1, ['class' => 'form-control text-uppercase', 'aria-describeby' => 'helpBlock1']) !!}
        <span id="helpBlock1" class="help-block">{{ 'Caso seja apenas 1 (uma) cópia, ignore este campo deixe o cursor em: 1 (um) número padrão'}} </span>
        <br>

        <!-- Solicita tipo de arquivo a ser impresso -->
        {!! Form::label('imp_tipo', 'Tipo de atividade') !!}
        {!! Form::select('imp_tipo', ["AT. ESCOLAR" => "ATIVIDADE ESCOLAR", "ADMINISTRATIVO" => "ADMINISTRATIVO", "OUTROS" => "OUTRO", "PARTICULAR" => "PARTICULAR", "PROVAS" => "PROVA"], isset($impressao->imp_tipo) ? $impressao->imp_tipo : null, ['class' => 'form-control']) !!}
        <BR>

        <!-- Solicita modo de impressão -->
        {!! Form::label('imp_modo', 'Modo de impressão') !!}
        {!! Form::select('imp_tipo', ["ECONÔMICO" => "ECONÔMICO", "NORMAL" => "NORMAL", "SUPER DENSIDADE" => "SUPER DENSIDADE"], isset($impressao->imp_modo) ? $impressao->imp_modo : null, ['class' => 'form-control']) !!}
        <BR>

        <!-- Solicita quantidade de cópias feitas -->
        {!! Form::label('imp_quantidade', 'Quantidade de impressões realizadas') !!}
        {!! Form::text('imp_quantidade', isset($impressao->imp_quantidade) ? $impressao->imp_quantidade : null, ['placeholder' => 'número de cópias realizadas', 'class' => 'form-control'] ) !!}
        <br>

        <!-- Resgata data atual em php -->
        <?php $dataAtual = date('Y-m-d'); ?>

        <!-- Solicita a data de impressão -->
        {!! Form::label('imp_data', 'Data que ocorreu essa impressão') !!}
        {!! Form::text('imp_data', isset($impressao->imp_data) ? $impressao->imp_data : $dataAtual, ['class' => 'form-control'] ) !!}
        <br>
        <br>
        <!--botao Novo -->
        {!! Form::submit('Incluir', ['class' => 'btn btn-success text-uppercase']) !!}

    @endif
        {!! Form::close() !!}
@endsection
