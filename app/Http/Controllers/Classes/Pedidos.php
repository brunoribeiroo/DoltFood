<?php
namespace cardapio\Http\Controllers\Classes;
use Illuminate\Support\Facades\DB;
/**
 * 
 */
class Pedidos
{

	
	public static function getPedidoGeral($user){
		$user = session()->getId();
			echo "<br>";
		echo $user."--- novo 6_pedido";
		exit();
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
		$user = session()->getId();
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
		$user = session()->getId();

		//echo $user;
			$pedido_cardapio=DB::table('pedido_x_ingrediente')
		->join('cardapio','cardapio.cardapio_id','=','pedido_x_ingrediente.cardapio_id')
		->join('pedido','pedido.pedido_id','=','pedido_x_ingrediente.pedido_id')	
	
		->where('cardapio_ativo','=','1')

		->where('pedido_user_temp','=',$user)
		
		->select("*")->get();

	
	/*	echo "<pre>";
		print_r($pedido_cardapio);
		echo "</pre>";
		exit();*/
		return $pedido_cardapio;

	}


}


?>