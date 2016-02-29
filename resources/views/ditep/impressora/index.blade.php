@extends('layouts.ditep.default')

@section('content')
    <h1>impressoras cadastradas: [ {!! $impressoras->count() !!} ]</h1>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed">
            <tr>
                <th>ID</th>
                <th>MODELO</th>
                <th width="156">GESTÃO</th>
            </tr>
            <tr><p class='text-right text-uppercase'>{!! Html::link('ditep/impressoras/add', 'Novo registro', ['class' => 'btn btn-success']) !!}</p></tr>

            @forelse ($impressoras as $impressora)
                <tr>
                    <td><p class='text-uppercase'>{{$impressora->id}}</p></td>
                    <td><p class='text-uppercase'>{{$impressora->modelo}}</p></td>
                    <td>
                        {!! Html::link("ditep/impressoras/edt/e/{$impressora->id}", 'Editar', ['class' => 'btn btn-primary']) !!}
                        {!! Html::link("ditep/impressoras/del/d/{$impressora->id}", 'Apagar', ['class' => 'btn btn-danger']) !!}
                    </td>
                </tr>

            @empty
                <p>
                    <b>
                        A base de informações está vazia...
                        {!! Html::link('ditep/impressoras/add', 'Clique aqui para adicionar um novo registro!') !!}
                    </b>
                </p>

            @endforelse

        </table>
        <!--paginação -->
        <div class="text-center">{!! $impressoras->render() !!}</div>
    </div>
@endsection
