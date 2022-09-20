@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')
    
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Detalhes Do Protudo</p>
        </div>

        <div class="menu">
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto">
                {{$msg ?? ''}}
                <form method="POST" action="{{ route('produto-detalhe.store') }}" >
                    @csrf
                    <input type="text" name="produto_id" value = "{{ old('produto_id') }}" placeholder="Produto Id" class="borda-preta">
                    {{ $errors->has('produto_id') ? $errors->first('produto_id') : ''}}

                    <input type="text" name="comprimento" value = "{{ old('comprimento') }}" placeholder="Comprimento" class="borda-preta">
                    {{ $errors->has('comprimento') ? $errors->first('comprimento') : ''}}

                    <input type="text" name="largura" value = "{{ old('largura') }}" placeholder="Largura" class="borda-preta">
                    {{ $errors->has('largura') ? $errors->first('largura') : ''}}

                    <input type="text" name="altura" value = "{{ old('altura') }}" placeholder="Altura" class="borda-preta">
                    {{ $errors->has('altura') ? $errors->first('altura') : ''}}

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