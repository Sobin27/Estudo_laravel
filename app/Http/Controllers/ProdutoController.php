<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\Produto;
use App\ProdutoDetalhe;
use App\Item;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Item::with('ProdutoDetalhe', 'fornecedor')->paginate(10);

        /*foreach($produtos as $key => $produto)
        {
            $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();

            if(isset($produtoDetalhe))
            {
                $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
                $produtos[$key]['largura'] =  $produtoDetalhe->largura;
                $produtos[$key]['altura'] =  $produtoDetalhe->altura;
            }
            
        }*/

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedor = Fornecedor::all();
        return view ('app.produto.create', ['unidades' => $unidades, 'fornecedor' => $fornecedor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedors,id',
        ];

        $feedack = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O nome deve ter uma quantidade minima de 3 caracteres',
            'nome.max' => 'O nome deve ter uma quantidade máxima de 40 caracteres',
            'descricao.min' => 'A descrição deve ter uma quantidade minima de 3 caracteres',
            'descricao.max' => 'A descrição deve ter uma quantidade máxima de 2000 caracteres',
            'peso.integer' => 'O peso deve ser do tipo inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists'=> 'O fornecedor informada não existe'
        ];
 
        $request->validate($regras, $feedack);
        
        Item::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedor = Fornecedor::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedor' => $fornecedor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidade,id',
            'fornecedor_id' => 'exists:fornecedors,id',
        ];

        $feedack = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O nome deve ter uma quantidade minima de 3 caracteres',
            'nome.max' => 'O nome deve ter uma quantidade máxima de 40 caracteres',
            'descricao.min' => 'A descrição deve ter uma quantidade minima de 3 caracteres',
            'descricao.max' => 'A descrição deve ter uma quantidade máxima de 2000 caracteres',
            'peso.integer' => 'O peso deve ser do tipo inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists'=> 'O fornecedor informada não existe'
        ];

        $request->validate($regras, $feedack);

        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
