<?php

namespace cardapio\Http\Controllers;

use Illuminate\Http\Request;

class ControllerGraficos extends Controller
{
     public function __construct()
    {
        $this->middleware('autorizador');
    }

    public function lista_graficos(){
         
         return view('grafico/lista');

    }




}
