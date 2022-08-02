<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        $motivo_contato = MotivoContato::all();

        return view('site.contato', ['motivo_contato' => $motivo_contato]);
    }

    public function salvar(Request $request)
    {
        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone   ');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // $contato->save();

        //$contato = new SiteContato();
        //$contato->create(($request->all()));
        //$contato->save();

        //validação de campo
        $regras = [
            'nome' => 'required|min:3|max:30|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:1000'
        ];

        $feedback =             [
            'nome.required' => 'O campo nome é necessário',
            'nome.min' => 'O campo nome precisa atender ao menos 3 caracteres',
            'nome.max' => 'O campo nome extendeu o numero máximo de 30 caracteres',
            'nome.unique' => 'Ja possui um nome cadastrado no banco',
            'telefone.required' => 'O campo telefone é necessário',
            'email.email' => 'Digite o campo de email válido',
            'motivo_contatos_id.required' => 'O campo Motivo Contato é necessário',
            'mensagem.required' => 'O campo mensagem é necessário',
            'mensagem.max' => 'O campo mensagem é extendeu o numero máximo de caracteres',
        ];


        $request->validate($regras, $feedback);
        
        // dd($request->all());
        // die;
        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
