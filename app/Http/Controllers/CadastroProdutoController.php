<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class CadastroProdutoController extends Controller
{

    public function cadastroProduto()


    {
      
        return view('Admin.cadastro'); 
    }

 
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'preco' => 'required|numeric',
        ]);

         if ($request->hasFile('imagem')) {
            $caminhoImagem = $request->file('imagem')->store('imagens', 'public'); 
            $validatedData['imagem'] = $caminhoImagem;

        
        $item = Item::create($validatedData);

     
  
    }
    return view('Admin.cadastro')->with('inserted', ' produto cadastrado com sucesso!');
}
}