@extends('layouts.ditep.default')

@section('content')
    <h1 class="text-uppercase">Toners cadastrados: [ {!! $toners->count() !!} ]</h1>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed">
            <tr>
                <th class="text-uppercase">Data da recarga</th>
                <th class="text-uppercase">Impressora</th>
                <th class="text-uppercase">Usuário</th>

                <th class="text-uppercase" width="90">GESTÃO</th>
            </tr>
            <tr><p class='text-right text-uppercase'><a href="ditep/toners/add" class="btn btn-success"><i class="fa fa-file-text" aria-hidden="true"></i> novo registro </a></p></tr>

            @forelse ($toners as $toner)
                <tr>
                    <td><p class='text-uppercase'>{{$toner->dia_recarga}}</p></td>
                    <td><p class='text-uppercase'>{{ $toner->getImpressoraModelo() }}</p></td>
                    <td><p class='text-uppercase'>{{$toner->getUserNome() }}</p></td>

                    <td class="text-center">
                        <!-- (Botão para editar) -->
                        <a href="/ditep/toners/edt/e/{{$toner->id}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <!-- (Botão para excluir/deletar) -->
                        <a href="/ditep/toners/del/d/{{$toner->id}}" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>

            @empty
                <p class="text-uppercase">
                    <b>
                        A base de informações está vazia...
                        {!! Html::link('ditep/toners/add', 'Clique aqui para adicionar um novo registro!') !!}
                    </b>
                </p>

            @endforelse

        </table>
        <!--paginação -->
        <div class="text-center">{!! $toners->render() !!}</div>
    </div>
@endsection
