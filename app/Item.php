<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome','fornecedor_id','descricao', 'peso', 'unidade_id'];

    public function ProdutoDetalhe()
    {
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');

        //Produto tem 1 produtoDetalhe
        //1 registro relacionado em produto detalhe (fk)-> produto_id
        //produtos (pk) -> id

    }

    public function fornecedor()
    {
        return $this->belongsTo('App\Fornecedor');
    }
}
