@extends('layouts.ditep.default')

@section('content')
    <h1 class="text-uppercase">ImpressÕes cadastradas: [ {!! $impressoes->count() !!} ]</h1>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed">
            <tr>
                <th class="text-uppercase">NOME</th>
                <th class="text-uppercase">impressora</th>
                <th class="text-uppercase">imp_quantidade</th>
                <th class="text-uppercase">imp_data</th>

                <th class="text-uppercase text-center" width="190">GESTÃO</th>
            </tr>
            <tr><p class='text-right text-uppercase'><a href="impressoes/add" class="btn btn-success"><i class="fa fa-file-text" aria-hidden="true"></i> novo registro </a></p></tr>

            @forelse ($impressoes as $impressao)

                <tr>
                    <td><p class='text-uppercase'>{{$impressao->id_cliente}}</p></td>
                    <td><p class='text-uppercase'>{{$impressao->id_impressora}}</p></td>
                    <td><p class='text-uppercase'>{{ $impressao->imp_quantidade }}</p></td>
                    <td><p class='text-uppercase'>{{$impressao->materia}}</p></td>
                    <td><p class='text-lowercase'>{{$impressao->imp_data}}</p></td>

                    <td class="text-center">
                        <!-- (Botão para editar) -->
                        <a href="/ditep/impressoes/edt/e/{{$impressao->id}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <!-- (Botão para excluir/deletar) -->
                        <a href="/ditep/impressoes/del/d/{{$impressao->id}}" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                        <a href="/ditep/impressoes/show/{{$impressao->id}}">SHOW</a>
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
