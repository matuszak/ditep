@extends('layouts.ditep.default')

@section('content')
    <h1 class="text-uppercase">ImpressÕes cadastradas: [ {!! $impressoes->count() !!} ]</h1>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed">
            <tr>
                <th class="text-uppercase">Data</th>
                <th class="text-uppercase">Por</th>
                <th class="text-uppercase">Impressora</th>
                <th class="text-uppercase">Toner</th>
                <th class="text-uppercase">Quantidade</th>
                <th class="text-uppercase">Observação</th>

                <th class="text-uppercase text-center" width="124">GESTÃO</th>
            </tr>
            <tr><p class='text-right text-uppercase'><a href="impressoes/add" class="btn btn-success"><i class="fa fa-file-text" aria-hidden="true"></i> novo registro </a></p></tr>

            @forelse ($impressoes as $impressao)

                <tr>
                    <td><p class='text-uppercase'>{{$impressao->imp_data}}</p></td>
                    <td><p class='text-uppercase'>{{$impressao->id_cliente}}</p></td>
                    <td><p class='text-uppercase'>{{$impressao->id_impressora}}</p></td>
                    <td><p class='text-uppercase'>{{ $impressao->rel }}</p></td>
                    <td><p class='text-uppercase'>{{$impressao->imp_quantidade }}</p></td>
                    <td><p class='text-uppercase'>{{$impressao->imp_obs}}</p></td>

                    <td class="text-center">
                        <a href="/ditep/impressoes/show/{{$impressao->id}}" class="btn btn-info btn-sm">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                        <!-- (Botão para editar) -->
                        <a href="/ditep/impressoes/edt/e/{{$impressao->id}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <!-- (Botão para excluir/deletar) -->
                        <a href="/ditep/impressoes/del/d/{{$impressao->id}}" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>

            @empty
                <p class="text-uppercase">
                    <b>
                        A base de informações está vazia...
                        {!! Html::link('ditep/impressoes/add', 'Clique aqui para adicionar um novo registro!') !!}
                    </b>
                </p>

            @endforelse

        </table>
        <!--paginação -->
        <div class="text-center">{!! $impressoes->render() !!}</div>
    </div>
@endsection
