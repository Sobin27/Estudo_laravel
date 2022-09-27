@extends('app.layouts.basico')

@section('titulo', 'Produto')
    
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Produtos </p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left:auto; margin-right:auto">

                <table border="1" width = "100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Nome do Fornecedor</th>
                            <th>Site do Fornecedor</th>
                            <th>Peso</th>
                            <th>Unidade Id</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th>Vizualizar</th>
                            <th>Excluir</th>
                            <th>Editar</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($produtos as $p )
                            <tr>
                                <td>{{$p->nome}}</td>
                                <td>{{$p->descricao}}</td>
                                <td>{{$p->fornecedor->nome}}</td>
                                <td>{{$p->fornecedor->site}}</td>
                                <td>{{$p->peso}}</td>
                                <td>{{$p->unidade_id}}</td>
                                <td>{{$p->produtoDetalhe->comprimento ?? ''}}</td>
                                <td>{{$p->produtoDetalhe->altura ?? ''}}</td>
                                <td>{{$p->produtoDetalhe->largura ?? ''}}</td>
                                <td><a href="{{ route('produto.show', ['produto' => $p->id]) }}">Vizualizar</a></td>
                                <td>
                                    <form id="form_{{$p->id}}" method="post" action="{{ route('produto.destroy', ['produto' => $p->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$p->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{route('produto.edit', ['produto' => $p->id])}}">Atualizar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                    {{$produtos->appends($request)->links()}}
                    <br>
                    <!--
                    {{$produtos->count().' - Total de Registo por página'}}
                    <br>
                    {{$produtos->total().' - Total de Registo da consulta'}}
                    <br>
                    {{$produtos->firstItem().' - Número do primeiro registro da página'}}
                    <br>
                    {{$produtos->LastItem().' - Número do ultimo registro da página'}}
                    -->

                    Exibindo {{$produtos->count()}} produtos de {{$produtos->total()}} (de {{$produtos->firstItem()}} a {{$produtos->LastItem()}})
            
            </div>
        </div>
    </div>

@endsection