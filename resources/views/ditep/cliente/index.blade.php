@extends('layouts.ditep.default')

@section('content')
    <h1>clientes cadastrados: [ {!! $clientes->count() !!} ]</h1>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>SETOR</th>
                <th>MATERIA</th>
                <th>EMAIL</th>
                <th>FONE1</th>
                <th>FONE2</th>

                <th width="156">GESTÃO</th>
            </tr>
            <tr><p class='text-right text-uppercase'>{!! Html::link('ditep/clientes/add', 'Novo registro', ['class' => 'btn btn-success']) !!}</p></tr>

            @forelse ($clientes as $cliente)
                <tr>
                    <td><p class='text-uppercase'>{{$cliente->id}}</p></td>
                    <td><p class='text-uppercase'>{{$cliente->nome}}</p></td>
                    <td><p class='text-uppercase'>{{$cliente->setor}}</p></td>
                    <td><p class='text-uppercase'>{{$cliente->materia}}</p></td>
                    <td><p class='text-uppercase'>{{$cliente->email}}</p></td>
                    <td><p class='text-uppercase'>{{$cliente->fone}}</p></td>
                    <td><p class='text-uppercase'>{{$cliente->fone2}}</p></td>
                    <td>
                        {!! Html::link("ditep/clientes/edt/e/{$cliente->id}", 'Editar', ['class' => 'btn btn-primary']) !!}
                        {!! Html::link("ditep/clientes/del/d/{$cliente->id}", 'Apagar', ['class' => 'btn btn-danger']) !!}
                    </td>
                </tr>

            @empty
                <p>
                    <b>
                        A base de informações está vazia...
                        {!! Html::link('ditep/clientes/add', 'Clique aqui para adicionar um novo registro!') !!}
                    </b>
                </p>

            @endforelse

        </table>
        <!--paginação -->
        <div class="text-center">{!! $clientes->render() !!}</div>
    </div>
@endsection
