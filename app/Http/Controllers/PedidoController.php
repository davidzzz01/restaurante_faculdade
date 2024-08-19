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
      $pedidos = Pedido::all();


    foreach ($pedidos as $pedido){
        $data_br = date('d-m-Y',strtotime( $pedido->created_at
   )); 

}
///aqui retorno uma view (pagina)
return view ('Admin.dashboard', compact('pedidos'));
}
}
