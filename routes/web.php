<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

Route::get('/sobrenos', 'SobreNosController@sobrenos')->name('site.sobrenos');

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::prefix('/app')->middleware('autenticacao:padrao,visitante')->group(function(){
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
    Route::get('/cliente', 'ClienteController@index')->name('app.cliente');
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::get('/produto', 'ProdutoController@index')->name('app.produto');
});

//Route::get('/teste/{p1p}/{2}', 'TesteController@teste')->name('site.rota1');


Route::fallback(function(){
    echo 'A rota acessada não existe <a href="'.route('site.index').'">clique aqui</a> para voltar a página inicial';
});





//redirecionamento de rotas
//Route::redirect('/rota2', '/rota1');
// ou 
// Route::get('/rota2', function(){
//     return redirect()->route('site.rota1');
// })->name('site.rota2');


// Route::get('/contato/{nome}/{categoria_id}', 
//     function(
//         $nome,
//         $categoria_id = 1
//     ){
//         echo "- $nome, $categoria_id";
//     }  
//   //verifica os parametros recebidos nas rotas por uma determinada condição:  
// )->where('categoria_id', '[0-9]+') ->where('nome', '[A-za-z]+');


//Sempre que precisar passar parametros na URL, utilizar desta forma:
// Route::get('/contato/{nome}/{categoria?}/{assunto?}/{mensagem?}', 
    
//     function($nome,
//     $categoria = "Informação" ,
//     $assunto = "Contato",
//     $mensagem = "mensagem não informada"){
//     echo "-$nome,$categoria ,$assunto, $mensagem";
//     }  

// );