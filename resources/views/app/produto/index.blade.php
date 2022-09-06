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
                            <th>Peso</th>
                            <th>Unidade Id</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($produtos as $p )
                            <tr>
                                <td>{{$p->nome}}</td>
                                <td>{{$p->descricao}}</td>
                                <td>{{$p->peso}}</td>
                                <td>{{$p->unidade_id}}</td>
                                <td><a href="{{route('app.fornecedor.excluir', $p->id)}}">Excluir</a></td>
                                <td><a href="{{route('app.fornecedor.editar', $p->id)}}">Atualizar</a></td>
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