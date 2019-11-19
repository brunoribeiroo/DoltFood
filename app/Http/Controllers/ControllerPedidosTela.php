<?php

namespace cardapio\Http\Controllers;



use cardapio\Http\Requests\PedidosTelaRequest;
use Illuminate\Support\Facades\DB;
use Request;
use Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ControllerPedidosTela extends Controller
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware('autorizador');
    }

    public function lista_pedidostela(){
         
    	$dados=array();
    		$cardapio_pendentes=DB::table('pedido_x_cardapio_status')
			->join('cardapio','pedido_x_cardapio_status.cardapio_id','=','cardapio.cardapio_id')
	
			->join('pedido','pedido.pedido_id','=','pedido_x_cardapio_status.pedido_id')
			->where('cardapio_ativo', '=', '1')
			->where('pedido_status','=','PENDENTE')
			
			->orderBy('pedido.pedido_id')
			
			->select("*")->get();

			$pedido_id=DB::table('pedido_x_cardapio_status')
			->join('cardapio','pedido_x_cardapio_status.cardapio_id','=','cardapio.cardapio_id')
			->join('pedido','pedido.pedido_id','=','pedido_x_cardapio_status.pedido_id')
			->where('pedido_status','=','PENDENTE')
			->where('cardapio_status','=','PENDENTE')
			->orderBy('pedido.pedido_id')
			->orderBy('cardapio.cardapio_id')
			->take(1)
			->select("*")->get();
			$pedido_id_number=0;
			$cardapio_id_number=0;
			foreach ($pedido_id as $z) {
				$pedido_id_number=$z->pedido_id;
				$cardapio_id_number=$z->cardapio_id;
			}

			

			$pedido_atual=DB::table('pedido_x_ingrediente')
			->join('cardapio','pedido_x_ingrediente.cardapio_id','=','cardapio.cardapio_id')
			->join('ingrediente','ingrediente.ingrediente_id','=','pedido_x_ingrediente.ingrediente_id')
			->join('pedido','pedido.pedido_id','=','pedido_x_ingrediente.pedido_id')
			->where('cardapio_ativo', '=', '1')
			->where('pedido.pedido_id', '=', $pedido_id_number)
			->where('cardapio.cardapio_id', '=', $cardapio_id_number)
			->distinct()
			->select("*")->get();









			$dados['cardapio_pendentes']=$cardapio_pendentes;
			$dados['pedido_atual']=$pedido_atual;




         return view('pedidostela/lista')->with('dados',$dados);

    }


    public function finalizar_cardapio(PedidosTelaRequest  $request){

    	

    	$params=$request->all();

    	$pedido_id=$params['pedido_id'];
    	$cardapio_id=$params['cardapio_id'];
    	$tempo_final=$params['tempo_final'];


    	$pedido_finalizado=true;


    	DB::table('pedido_x_cardapio_status')
		->where('pedido_id','=',$pedido_id)
		->where('cardapio_id','=',$cardapio_id)
		->update(['cardapio_status' => 'FINALIZADO','end_time'=>$tempo_final]);


    	$lista_pedido=DB::table('pedido_x_cardapio_status')
			->join('cardapio','pedido_x_cardapio_status.cardapio_id','=','cardapio.cardapio_id')
			->join('pedido','pedido.pedido_id','=','pedido_x_cardapio_status.pedido_id')
			->where('pedido.pedido_id','=',$pedido_id)
	
			->select("*")->get();

		foreach ($lista_pedido as $q) {
			if($q->cardapio_status=="PENDENTE"){
				$pedido_finalizado=false;
			}
		}

		if($pedido_finalizado){
			DB::table('pedido')
		->where('pedido_id','=',$pedido_id)
		->update(['pedido_status' => 'FINALIZADO']);
		}
		echo 1;
		return 1;

    }


}
