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
                <form method="POST" action="{{ route('produto.store') }}" >
                    @csrf
                    <select name="fornecedor_id">
                        <option value="">-- Selecione um fornercedor --</option>

                        @foreach ($fornecedor as $f)
                        <option value="{{$f->id}}" {{ ($produto->fornecedor_id ?? old('fornecedor_id')) == $f->id ? 'selected' : '' }}>{{$f->nome}}</option>
                        @endforeach
                    </select>
                    
                    <input type="text" name="nome" value = "{{ old('nome') }}" placeholder="Nome" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : ''}}

                    <input type="text" name="descricao" value = "{{ old('descricao') }}" placeholder="Descrição" class="borda-preta">
                    {{ $errors->has('descricao') ? $errors->first('descricao') : ''}}

                    <input type="text" name="peso" value = "{{ old('peso') }}" placeholder="peso" class="borda-preta">
                    {{ $errors->has('peso') ? $errors->first('peso') : ''}}

                    <select name="unidade_id">
                        <option value="">-- Selecione a Unidade de Medida --</option>

                        @foreach ($unidades as $u)
                        <option value="{{$u->id}}" {{ old('unidade_id') == $u->id ? 'selected' : '' }}>{{$u->descricao}}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}

                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection