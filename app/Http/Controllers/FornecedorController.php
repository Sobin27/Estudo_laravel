<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
            0 =>['nome'=>'fornecedor 1', 
                'status'=>'S', 
                'cnpj'=> '00',
                'ddd' => '85',
                'telefone' => '0000-0000'
            ],
            1 =>['nome'=>'fornecedor 2', 
                'status'=>'n',
                'cnpj'=> '00',
                'ddd' => '11',
                'telefone' => '0000-0000'
            ],
            2 =>['nome'=>'fornecedor 3', 
                'status'=>'n',
                'cnpj'=> '00',
                'ddd' => '32',
                'telefone' => '0000-0000'
            ]   
        ];

        //    $msg =isset($fornecedores[0]['cnpj']) ? 'CNPJ informado' : 'CNPJ não informado';
        //    echo $msg;

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
