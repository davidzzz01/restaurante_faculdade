<?php

namespace App\Http\Controllers;
use App\Models\Item;
use \App\Models\Pedido;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){

        $itens= Item::all();

    
        return view('Client.index', compact('itens'));

    }

    public function exibirCarrinho(Request $request)
    {
       
        $carrinho = $request->session()->get('carrinho', []);

     
        $total = array_reduce($carrinho, function ($carry, $item) {
            return $carry + ($item['preco'] * $item['quantidade']);
        }, 0);

        
        return view('Client.carrinho', compact('carrinho', 'total'));
    }

    public function finalizarPedido(Request $request)
    {
        
        $user = auth()->user();

       
        $total = 0;
        $itensCarrinho = $request->session()->get('carrinho', []);
        foreach ($itensCarrinho as $item) {
            $total += $item['preco'] * $item['quantidade'];
        }

    
        $pedido = new Pedido();
        $pedido->user_id = $user->id;
        $pedido->total = $total;
        $pedido->status = 'pendente'; 
        $pedido->save();

    
        foreach ($itensCarrinho as $item) {
            Pedido::create([
                'user_id'=>$pedido->user_id,
                'pedido_id' => $pedido->id,
                'item_id' => $item['id'],
                'quantidade' => $item['quantidade'],
                'preco' => $item['preco'],
                'total'=> $total
            ]);
        }

    
        $request->session()->forget('carrinho');

       
        return redirect()->route('index')->with('success', 'Pedido realizado com sucesso!');
    }

    public function adicionarAoCarrinho(Request $request, $itemId)
{
    $item = Item::findOrFail($itemId);

    $carrinho = $request->session()->get('carrinho', []);
    $carrinho[$itemId] = [
        'id' => $item->id,
        'nome' => $item->nome,
        'preco' => $item->preco,
        'quantidade' => isset($carrinho[$itemId]) ? $carrinho[$itemId]['quantidade'] + 1 : 1,
    ];

    $request->session()->put('carrinho', $carrinho);

    return redirect()->back()->with('success', 'Item adicionado ao carrinho!');
}

public function removerItem(Request $request, $id)
    {
      
        $carrinho = $request->session()->get('carrinho', []);

       
        if (isset($carrinho[$id])) {
            unset($carrinho[$id]);
        }

        
        $request->session()->put('carrinho', $carrinho);

       
        return redirect()->route('carrinho.exibir')->with('success', 'Item removido do carrinho.');
    }
}
