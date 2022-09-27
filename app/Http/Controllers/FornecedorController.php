<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::with('produtos')->where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site'). '%')
            ->where('uf', 'like', '%'.$request->input('uf'). '%')
            ->where('email', 'like', '%'.$request->input('email'). '%')
        ->paginate(5);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request)
    {
        $msg = '';

        //cadastro
        if($request->input('_token') != '' && $request->input('id') == '')
        {
            $regras = [
                'nome' => 'required|string|min:3|max:40',
                'site' => 'required|string',
                'uf' => 'required|string|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no minimo 3 letras',
                'nome.max' => 'O campo nome deve ter no máximo 40 letras',
                'uf.min' => 'O campo uf deve ter no minimo 2 letras', 
                'uf.max' => 'O campo uf deve ter no máximo 2 letras',
                'email.email' => 'O campo email deve ser do tipo email' 
            ];

            $request->validate($regras,$feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
            
            $msg = "Cadastro realizado com sucesso";
        }

        //edição
        if($request->input('_token') != '' && $request->input('id') != '')
        {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update)
            {
                $msg = 'Update realizado com sucesso';
            }else
            {
                $msg = 'Erro ao atualizar o registo';
            }

            return redirect()->route('app.fornecedor.editar', ['msg' => $msg, 'id' => $request->input('id')]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg,]);
    }

    public function excluir($id)
    {
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');
    }

    public function editar($id, $msg = '')
    {
        $fornecedor = Fornecedor::find($id);   
        
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }
}
