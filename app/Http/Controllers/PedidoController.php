<?php

namespace App\Http\Controllers;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Item;


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


$totalGeral = 0;
foreach ($pedidos as $pedido) {
$preco_br = floatval($pedido->total);
$totalGeral += $preco_br;
$status = $pedido->status;

if($status === 'pendente'){
$pedido->color='orange';
}elseif ($status ==='cancelado'){
$pedido->color='red';
}elseif ($status ==='solicitado'){
$pedido->color='blue';
}else{
$pedido->color='green';
}
$pedido->preco=number_format($preco_br, 2, ',', '.');
$pedido->data=date('d-m-Y', strtotime($pedido->item_create_at));
}
$totalGeralFormatado = number_format($totalGeral, 2, ',', '.');



///aqui retorno uma view
return view ('Admin.dashboard', compact('pedidos', 'totalGeralFormatado'));

}


public function destroy($id){
$pedido = Pedido::findOrFail($id);
$pedido->delete();

return view('Admin.dashboard');

}

public function statusUpdate(Request $request, $id)
{

$pedidos = Pedido::find($id);




$pedidos->update([
'status' => $request->status,
]);


return view('Admin.dashboard', compact('pedidos'));
}






}
