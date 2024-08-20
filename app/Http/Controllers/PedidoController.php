<?php

namespace App\Http\Controllers;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PedidoController extends Controller
{
public function dashboard(){
    ///Aqui estou pegando os dados da Model/Tabela do banco e colocando tudo num objeto
$pedidos = DB::select('
SELECT  pedidos.id AS pedido_id, users.name AS nome_cliente, itens.nome AS nome_item, pedidos.status,   pedidos.total, pedidos.created_at AS item_create_at
FROM  pedidos
JOIN  users ON pedidos.user_id = users.id
JOIN itens ON pedidos.item_id = itens.id
ORDER BY  pedidos.id, users.name,  pedidos.created_at, pedidos.total; ');



///aqui retorno uma view
return view ('Admin.dashboard', compact('pedidos'));
}
}
