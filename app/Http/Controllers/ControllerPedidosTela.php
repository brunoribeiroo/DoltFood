<?php

namespace cardapio\Http\Controllers;

use Illuminate\Http\Request;

class ControllerPedidosTela extends Controller
{
    public function __construct()
    {
        $this->middleware('autorizador');
    }

    public function lista_pedidostela(){
         
         return view('pedidostela/lista');

    }
}
