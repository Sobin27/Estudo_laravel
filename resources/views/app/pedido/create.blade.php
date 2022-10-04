@extends('app.layouts.basico')

@section('titulo', 'Pedido')
    
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Pedido</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto">
                {{$msg ?? ''}}
                <form method="POST" action="{{ route('pedido.store') }}" >
                    @csrf
                  
                    <select name="cliente_id">
                        <option value="">-- Selecione um cliente --</option>

                        @foreach ($clientes as $c)
                        <option value="{{$c->id}}" {{ ($pedido->cliente_id ?? old('cliente_id') == $c->id ? 'selected' : '' )}}>{{$c->nome}}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : ''}}

                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection