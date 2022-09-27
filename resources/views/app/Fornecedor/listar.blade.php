@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')
    
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - lista </p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left:auto; margin-right:auto">

                <table border="1" width = "100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>Uf</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($fornecedores as $f )
                            <tr>
                                <td>{{$f->nome}}</td>
                                <td>{{$f->site}}</td>
                                <td>{{$f->uf}}</td>
                                <td>{{$f->email}}</td>
                                <td><a href="{{route('app.fornecedor.excluir', $f->id)}}">Excluir</a></td>
                                <td><a href="{{route('app.fornecedor.editar', $f->id)}}">Atualizar</a></td>
                            </tr>

                            <tr>
                                <td colspan="6">
                                    <p>Lista de Produtos</p>
                                    <table border="1" style="margin: 20px">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($f->produtos as $key => $p)
                                                <tr>
                                    
                                                    <td>{{ $p->id }}</td>
                                                    <td>{{ $p->nome }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                    {{$fornecedores->appends($request)->links()}}
                    <br>
                    <!--
                    {{$fornecedores->count().' - Total de Registo por página'}}
                    <br>
                    {{$fornecedores->total().' - Total de Registo da consulta'}}
                    <br>
                    {{$fornecedores->firstItem().' - Número do primeiro registro da página'}}
                    <br>
                    {{$fornecedores->LastItem().' - Número do ultimo registro da página'}}
                    -->

                    Exibindo {{$fornecedores->count()}} fornecedores de {{$fornecedores->total()}} (de {{$fornecedores->firstItem()}} a {{$fornecedores->LastItem()}})
            
            </div>
        </div>
    </div>

@endsection