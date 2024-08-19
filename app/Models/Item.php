<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;


    protected $table = 'itens';

    protected $fillable = [
        'nome',
        'preco',
        'descricao',
        'imagem',
    ];

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedido_itens')->withPivot('quantidade', 'preco')->withTimestamps();
    }
}
