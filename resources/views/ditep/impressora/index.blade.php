@extends('layouts.ditep.default')

@section('content')
  <h1></h1>
  </br>
  {!! Html::link('ditep/impressoras/add', 'Novo') !!}

  @forelse ($impressoras as $impressora)
    <p>
      <b>id: </b>{{$impressora->id}} - <b>modelo: </b> {{$impressora->modelo}}
      ---
      {!! Html::link("ditep/impressoras/edt/e/{$impressora->id}", 'Editar') !!}
      |
      {!! Html::link("ditep/impressoras/del/d/{$impressora->id}", 'Apagar') !!}
    </p>

  @empty
    <p>
      <b>
        A base de informações está vazia...
        {!! Html::link('ditep/impressoras/add', 'Clique aqui para adicionar um novo registro!') !!}
      </b>
    </p>

  @endforelse

<!--paginação -->
  {!! $impressoras->render() !!}

@endsection
