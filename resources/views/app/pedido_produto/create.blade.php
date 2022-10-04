@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')
    
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produtos ao Pedido</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <h4>Detalhes do Pedido</h4>
            <p>Id do pedido: {{$pedido->id}}</p>
            <p>Cliente: {{$pedido->cliente_id}}</p>

            <div style="width: 30%; margin-left:auto; margin-right:auto">
                <h4>Itens do pedido</h4>
                <table border="1" width='100%'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Produto</th>
                            <th>Data de inclusão do item</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pedido->produtos as $p)
                            <tr>
                                <td>{{$p->id}}</td>
                                <td>{{$p->nome}}</td>
                                <td>{{$p->pivot->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <form id="form_{{$p->pivot->id}}" method="post" action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $p->pivot->id, 'pedido_id' => $pedido->id ])}}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$p->pivot->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <form method="POST" action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}" >
                    @csrf
                  
                    <select name="produto_id">
                        <option value="">-- Selecione um produto --</option>

                        @foreach ($produtos as $produto)
                        <option value="{{$produto->id}}" {{ old('produto_id') == $produto->id ? 'selected' : '' }}>{{$produto->nome}}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('produto_id') ? $errors->first('produto_id') : ''}}

                    <input type="number" name="quantidade" value="{{ old('quantidade') ? old('quantidade') : ''}}" placeholder="Quantidade" class="borda-preta">
                    {{ $errors->has('quantidade') ? $errors->first('quantidade') : ''}}


                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection