@extends('layouts.ditep.default')

@section('content')
    <h1 class="text-uppercase">clientes cadastrados: [ {!! $clientes->count() !!} ]</h1>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed">
            <tr>
                <th class="text-uppercase">ID</th>
                <th class="text-uppercase">NOME</th>
                <th class="text-uppercase">SETOR</th>
                <th class="text-uppercase">MATÉRIA</th>
                <th class="text-uppercase">EMAIL</th>
                <th class="text-uppercase">FONE1</th>
                <th class="text-uppercase">FONE2</th>

                <th class="text-uppercase" width="60">GESTÃO</th>
            </tr>
            <tr><p class='text-right text-uppercase'>{!! Html::link('ditep/clientes/add', 'Novo registro', ['class' => 'btn btn-success']) !!}</p></tr>

            @forelse ($clientes as $cliente)
                <tr>
                    <td><p class='text-uppercase'>{{$cliente->id}}</p></td>
                    <td><p class='text-uppercase'>{{$cliente->nome}}</p></td>
                    <td>
                        <p class='text-uppercase'>{{ $cliente->id_setor }}</p>
                    </td>
                    <td><p class='text-uppercase'>{{$cliente->materia}}</p></td>
                    <td><p class='text-lowercase'>{{$cliente->email}}</p></td>
                    <td><p class='text-uppercase'>{{$cliente->fone}}</p></td>
                    <td><p class='text-uppercase'>{{$cliente->fone2}}</p></td>
                    <td class="text-center">
                        <!-- (Botão para editar) -->
                        <a href="/ditep/clientes/edt/e/{{$cliente->id}}">
                            <button type="button" class="btn btn-primary btn-xs">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </button>
                        </a>
                        <!-- (Botão para excluir/deletar) -->
                        <a href="/ditep/clientes/del/d/{{$cliente->id}}">
                            <button type="button" class="btn btn-danger btn-xs">
                                <span class="glyphicon glyphicon-erase" aria-hidden="true"></span>
                            </button>
                        </a>
                    </td>
                </tr>

            @empty
                <p class="text-uppercase">
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
