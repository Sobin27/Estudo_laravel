@extends('app.layouts.basico')

@section('titulo', 'Cliente')
    
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Cliente</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto">
                {{$msg ?? ''}}
                <form method="POST" action="{{ route('cliente.store') }}" >
                    @csrf
                    <input type="text" name="nome" value = "{{ old('nome') }}" placeholder="Nome" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : ''}}

                    
                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection