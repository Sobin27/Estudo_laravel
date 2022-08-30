<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if($request->get('erro') == 1)
        {
            $erro = 'Usuario ou senha não válidos'; 
        }

        if($request->get('erro') == 2)
        {
            $erro = 'Necessário realizar o login para ter acesso a página'; 
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }


    public function autenticar(Request $request)
    {

        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //Feedback de validação
        $feed = [
            'usuario.email' => 'O campo usuario é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        //validação dos campos
        $request->validate($regras, $feed);


        //recuperação dos parametros
        $email = $request->get('usuario');
        $password = $request->get('senha');

        //Model user
        $user = new User();

        $consult = $user->where('email', $email)->where('password', $password)->get()->first();

        if(isset($consult->name))
        {
            session_start();
            $_SESSION['nome'] = $consult->name;
            $_SESSION['email'] = $consult->email;

            return redirect()->route('app.home');
        }
            
        return redirect()->route('site.login', ['erro' => 1]);
        
    }

    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
