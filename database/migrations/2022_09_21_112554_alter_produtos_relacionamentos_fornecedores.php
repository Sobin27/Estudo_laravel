<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentosFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criando a coluna em produtos q vai receber a fk de fornecedores
        Schema::table('produtos', function(Blueprint $table){

            //insetir um registro de fornecedores para estabelecer o relacionamento
            $fornecedorId = DB::table('fornecedors')->insertGetId([
                'nome' => 'Fornecedor Padrão SG',
                'site' => 'fornecedorpadraosg.com.br',
                'uf' => 'CE',
                'email' => 'fornecedorpadraosg@gmail.com',
            ]);

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedorId)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function(Blueprint $table){
        $table->dropforeign('produtos_fornecedor_id_foreign');
        $table->dropColumn('fornecedor_id');
        });
    }
}
