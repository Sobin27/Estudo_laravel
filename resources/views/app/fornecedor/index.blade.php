<h3>Fornecedor</h3>

{{-- Comentário do blade --}}


@php 
    //Para utilizar blocos de php puro

@endphp

{{-- Utiliza-se para mostrar um array que está contido em uma variável:
                @dd($fornecedores) 
--}}

{{-- @if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif    

@unless()<!-- se o retorno da condição for falso--> --}}


@isset($fornecedores)
        @forelse ( $fornecedores as $indc => $fornecedor)
            
            Interação atual: {{$loop->iteration}}
            <br>
            Fornecedor: {{$fornecedor['nome']}}
            <br>
            Status: {{$fornecedor['status']}}
            <br>
            CNPJ: {{$fornecedor['cnpj'] ?? 'Dado não preenchido'}}
            <!--
                Vai testar se a $variavel testada vai estar definida(isset)
                ou
                se a $variavel testada possui o valor null
            -->
            <br>
            Telefone:  ({{$fornecedor['ddd'] ?? ''}})  {{$fornecedor['telefone'] ?? ''}}
                @switch($fornecedor['ddd'])
                    @case('11')
                        São Paulo - Sp
                    @break

                    @case('32')
                        Juiz de Fora - MG
                    @break

                    @case('85')
                        Forteleza - CE
                    @break

                    @default
                        Estado não identificado 
                @endswitch
                <br>
                @if ($loop->first)
                    Primeira Interação do loop

                @endif
                <hr>
                Total de Registos: {{$loop->count}}

                @empty
                Não existem fornecedores cadastrados
        @endforelse
@endisset

{{-- @for ( $i = 0 ; isset($fornecedores[$i]) ; $i++)
        
     Fornecedor: {{$fornecedores[$i]['nome']}}
    <br>
    Status: {{$fornecedores[$i]['status']}}
    <br>
    CNPJ: {{$fornecedores[$i]['cnpj'] ?? 'Dado não preenchido'}}
    <!--
        Vai testar se a $variavel testada vai estar definida(isset)
        ou
        se a $variavel testada possui o valor null
    -->
    <br>
    Telefone:  ({{$fornecedores[$i]['ddd'] ?? ''}})  {{$fornecedores[$i]['telefone'] ?? ''}}
    @switch($fornecedores[$i]['ddd'])
        @case('11')
            São Paulo - Sp
        @break

        @case('32')
            Juiz de Fora - MG
        @break

        @case('85')
            Forteleza - CE
        @break

        @default
        Estado não identificado 

       @endswitch
    <br>
    <hr>
@endfor --}}



{{-- @isset($fornecedores[0]['cnpj'])
    CNPJ: {{$fornecedores[0]['cnpj']}}
        @empty($fornecedores[0]['cnpj'])
             -Vazio
        @endempty    
@endisset     --}}