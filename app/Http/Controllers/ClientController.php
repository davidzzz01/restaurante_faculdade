<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){

        $itens= Item::all();

    
        return view('Client.index', compact('itens'));

    }
}
