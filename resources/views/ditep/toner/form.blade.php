@extends('layouts.ditep.default')

@section('content')
    <?php
    $tiADD = strtoupper("Incluir novo toner");
    $tiEDT = strtoupper("Editar toner");
    $tiDEL = strtoupper("<h1><font color='red'>Apagar toner (AtenÇÃo)</font></h1>");
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

    @if( (isset($acao)) and (isset($toner)) )
        @if($acao == 'e')
        <!-- AÇÃO DE EDITAR -->
        <h1 class="text-uppercase"><?php echo ($tiEDT); ?></h1><br>

        {!! Form::open( ['url' => "ditep/toners/edt/$toner->id", 'class' => 'form'] ) !!}
                {!! Form::label('dataRecarga', 'Data de recarga') !!}<br>
                    {!! Form::text('dia_recarga', isset($dia_recarga->dia_recarga) ? $dia_recarga->dia_recarga : date('Y-m-d'),['class' => 'form-control']) !!}<br>
                {!! Form::label('id_impressora', 'Impressora vinculada') !!}<br>
                    {!! Form::select('id_impressora', $impressoras, isset($toner->id_impressora) ? $toner->id_impressora : null, ['class' => 'form-control', 'aria-describeby' => 'helpBlock1']) !!}
                <span id="helpBlock1" class="help-block">{{ Html::link ('ditep/impressoras/add', 'Impressora não encontrada? Clique aqui e adicione a lista!') }}</span>
                {!! Form::hidden('id_user', 4) !!}
            <br>
            <!--botao Editar -->
            {!! Form::submit('Editar', ['class' => 'btn btn-primary text-uppercase']) !!}
        @else
        <!-- AÇÃO DE DELETAR/APAGAR -->
        <h1 class="text-uppercase"><?php echo ($tiDEL); ?><br>
        {!! Form::open( ['url' => "ditep/toners/del/$toner->id", 'class' => 'form'] ) !!}
                {!! Form::label('dataRecarga', 'Data de recarga') !!}<br>
                    {!! Form::text('dia_recarga', isset($dia_recarga->dia_recarga) ? $dia_recarga->dia_recarga : date('Y-m-d'),['class' => 'form-control', 'disabled']) !!}<br>
                {!! Form::label('id_impressora', 'Impressora vinculada') !!}<br>
                    {!! Form::select('id_impressora', $impressoras, isset($toner->id_impressora) ? $toner->id_impressora : null, ['class' => 'form-control', 'aria-describeby' => 'helpBlock1', 'disabled']) !!}
                <span id="helpBlock1" class="help-block">{{ Html::link ('ditep/impressoras/add', 'Impressora não encontrada? Clique aqui e adicione a lista!') }}</span>
                {!! Form::hidden('id_user', 4) !!}
            <br>
            <input type="hidden" name="confirma" value="true">
            <!--botao Apagar -->
            {!! Form::submit('Apagar', ['class' => 'btn btn-danger text-uppercase']) !!}
        @endif
    @else
                <!-- AÇÃO DE INCLUIR/ADICIONAR -->
        <h1 class="text-uppercase"><?php echo ($tiADD); ?></h1><br>
        {!! Form::open( ['url' => "ditep/toners/add", 'class' => 'form'] ) !!}
            {!! Form::label('dataRecarga', 'Data de recarga') !!}<br>
                {!! Form::text('dia_recarga', isset($dia_recarga->dia_recarga) ? $dia_recarga->dia_recarga : date('Y-m-d'),['class' => 'form-control']) !!}<br>
            {!! Form::label('id_impressora', 'Impressora vinculada') !!}<br>
                {!! Form::select('id_impressora', $impressoras, isset($toner->id_impressora) ? $toner->id_impressora : null, ['class' => 'form-control', 'aria-describeby' => 'helpBlock1']) !!}
                <span id="helpBlock1" class="help-block">{{ Html::link ('ditep/impressoras/add', 'Impressora não encontrada? Clique aqui e adicione a lista!') }}</span>
            {!! Form::hidden('id_user', 4) !!}
        <br>
            <!--botao Novo -->
            {!! Form::submit('Incluir', ['class' => 'btn btn-success text-uppercase']) !!}
    @endif

        {!! Form::close() !!}
@endsection
