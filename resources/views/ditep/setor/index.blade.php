@extends('layouts.ditep.default')

@section('content')
    <h1 class="text-uppercase">setores cadastrados: [ {!! $setores->count() !!} ]</h1>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed">
            <tr>
                <th class="text-uppercase">Nome do Setor</th>

                <th class="text-uppercase" width="90">GESTÃO</th>
            </tr>
            <tr><p class='text-right text-uppercase'>{!! Html::link('ditep/setores/add', 'Novo registro', ['class' => 'btn btn-success']) !!}</p></tr>

            @forelse ($setores as $setor)
                <tr>
                    <td><p class='text-uppercase'>{{$setor->nome}}</p></td>

                    <td class="text-center">
                        <!-- (Botão para editar) -->
                        <a href="/ditep/setores/edt/e/{{$setor->id}}" class="btn btn-primary btn-sm">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                        <!-- (Botão para excluir/deletar) -->
                        <a href="/ditep/setores/del/d/{{$setor->id}}" class="btn btn-danger btn-sm">
                            <span class="glyphicon glyphicon-erase" aria-hidden="true"></span>
                        </a>
                        </a>
                    </td>
                </tr>

            @empty
                <p class="text-uppercase">
                    <b>
                        A base de informações está vazia...
                        {!! Html::link('ditep/setores/add', 'Clique aqui para adicionar um novo registro!') !!}
                    </b>
                </p>

            @endforelse

        </table>
        <!--paginação -->
        <div class="text-center">{!! $setores->render() !!}</div>
    </div>
@endsection
