<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome','descricao', 'peso', 'unidade_id'];

    public function ProdutoDetalhe()
    {
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');

        //Produto tem 1 produtoDetalhe
        //1 registro relacionado em produto detalhe (fk)-> produto_id
        //produtos (pk) -> id

    }
}
