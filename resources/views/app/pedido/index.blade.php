@extends('app.layouts.basico')

@section('titulo', 'Pedido')
    
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Pedido </p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left:auto; margin-right:auto">

                <table border="1" width = "100%">
                    <thead>
                        <tr>
                            <th>Id do Pedido</th>
                            <th>Cliente</th>
                            <th>Produtos</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pedidos as $p )
                            <tr>
                                <td>{{$p->id}}</td>
                                <td>{{$p->cliente_id}}</td>
                                <td><a href="{{route('pedido-produto.create', ['pedido' => $p->id])}}">Adicionar Protudo</a></td>
                                <td><a href="{{ route('pedido.show', ['pedido' => $p->id]) }}">Vizualizar</a></td>
                                <td>
                                    <form id="form_{{$p->id}}" method="post" action="{{ route('pedido.destroy', ['pedido' => $p->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$p->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{route('pedido.edit', ['pedido' => $p->id])}}">Atualizar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                    {{$pedidos->appends($request)->links()}}
                    <br>
                    <!--
                    {{$pedidos->count().' - Total de Registo por página'}}
                    <br>
                    {{$pedidos->total().' - Total de Registo da consulta'}}
                    <br>
                    {{$pedidos->firstItem().' - Número do primeiro registro da página'}}
                    <br>
                    {{$pedidos->LastItem().' - Número do ultimo registro da página'}}
                    -->

                    Exibindo {{$pedidos->count()}} pedidos de {{$pedidos->total()}} (de {{$pedidos->firstItem()}} a {{$pedidos->LastItem()}})
            
            </div>
        </div>
    </div>

@endsection