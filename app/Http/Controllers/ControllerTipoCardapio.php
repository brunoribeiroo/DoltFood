<?php

namespace cardapio\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use cardapio\Http\Requests\TipoCardapioRequest;


class ControllerTipoCardapio extends Controller
{
       public function __construct()
    {
        $this->middleware('autorizador');
    }
     public function novo(){
    	 
        return view('tipo_cardapio/formulario');
    }
    public function adiciona(){
    	 $ingrediente = DB::table('tipo_cardapio')->get();
        $params=Request::all();
 	
    $tipo_cardapio_descr=$params['nome_tipo_cardapio'];
    DB::table('tipo_cardapio')->insert([
    ['tipo_cardapio_descr' => $tipo_cardapio_descr]
]);


          return redirect('tipo_cardapio/');
    }

    public function listagem(){
        $tipo_cardapio = DB::table('tipo_cardapio')
        ->select('tipo_cardapio_id','tipo_cardapio_descr', 'tipo_cardapio_ativo')->get();

        return view('tipo_cardapio/listagem')->with('tipo_cardapio',$tipo_cardapio);


    }

}
