@extends('app.layouts.basico')

@section('titulo', 'Produto')
    
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Protudo</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto">
                {{$msg ?? ''}}
                <form method="POST" action="" >
                    @csrf
                    <input type="text" name="nome" value = "" placeholder="Nome" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : ''}}

                    <input type="text" name="descricao" value = "" placeholder="Descrição" class="borda-preta">
                    {{ $errors->has('site') ? $errors->first('site') : ''}}

                    <input type="text" name="peso" value = "" placeholder="peso" class="borda-preta">
                    {{ $errors->has('uf') ? $errors->first('uf') : ''}}

                    <select name="unidade_id">
                        <option value="">-- Selecione a Unidade de Medida --</option>

                        @foreach ($unidades as $u)
                        <option value="{{$u->id}}">{{$u->descricao}}</option>
                        @endforeach
                    </select>

                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection