<?php
namespace cardapio\Http\Controllers\Classes;
use Illuminate\Support\Facades\DB;
/**
 * 
 */
class Pedidos
{

	public function __construct(){

	}
	public static function getPedidoSession(){
		if(!isset($_COOKIE['pedido_entrado'])){
			$_COOKIE['pedido_entrado']='produto_'.md5('pedido_1');
			return $_COOKIE['pedido_entrado'];
		}else{
			return $_COOKIE['pedido_entrado'];
		}
	
    	return false;
	}
	
	public static function getPedidoGeral($user){
		$user=Pedidos::getPedidoSession();

		$pedido_numero=Pedidos::getPedido($user);

		$data= Date('Y-m-d H:i:s');
		//INSERT into pedido  (pedido_data,pedido_user,pedido_status,pedido_ativo) values
	
		if($pedido_numero<=0){
			 DB::table('pedido')->insert([
    			['pedido_data' => $data, 'pedido_user_temp'=>$user,'pedido_status'=>'CRIADO','pedido_ativo'=>1]]);
			 $pedido_numero=Pedidos::getPedido($user);

		}

		return $pedido_numero;
	}

		public static function getPedido($user){
		$retorno=0;
	
		$data= Date('Y-m-d H:i:s');
		$user=Pedidos::getPedidoSession();

	/*	echo "<br>";
		echo $user."--- novo s_pedido";
*/
		$pedido_pendente=DB::table('pedido')
		->where('pedido_user_temp', '=', $user)
		->where('pedido_status','=','CRIADO')
		->select('pedido_id')
		->get();
	/*	echo count($pedido_pendente);
		exit();*/
		if(count($pedido_pendente)<=0){
			return $retorno;
		}else{

			foreach ($pedido_pendente as $p) {
				$retorno=$p->pedido_id;
			}
			return $retorno;
		}


	}

	public static function MontaPedido(){
		$user=Pedidos::getPedidoSession();

	


	$pedido_cardapio=DB::table('pedido_x_ingrediente')
			->join('cardapio','pedido_x_ingrediente.cardapio_id','=','cardapio.cardapio_id')
			->join('ingrediente','ingrediente.ingrediente_id','=','pedido_x_ingrediente.ingrediente_id')
			->join('pedido','pedido_x_ingrediente.pedido_id','=','pedido.pedido_id')
			->where('cardapio_ativo', '=', '1')
			
		->where('pedido_user_temp','=',"".$user."")
	
			->select("*")->get();
		

		return view()->with('pedido_cardapio',$pedido_cardapio);

	}


}


?>