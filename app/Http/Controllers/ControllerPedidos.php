<?php


namespace cardapio\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use cardapio\Http\Requests\PedidosRequest;
use cardapio\Http\Controllers\Classes\QRcode1;
use cardapio\Http\Controllers\Classes\Pedidos;


class ControllerPedidos		 extends Controller
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
	
       // $this->middleware('autorizador');
   		

    	$pedido_cardapio=Pedidos::MontaPedido();
    	


    }
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests; 

	
	public function novo_pedido(){
		$user=Pedidos::getPedidoSession();
		$pedido_numero=Pedidos::getPedidoGeral($user);



		$cardapio_listagem=DB::table('cardapio_x_ingrediente')
		->join('cardapio','cardapio.cardapio_id','=','cardapio_x_ingrediente.cardapio_id')
		->join('ingrediente','ingrediente.ingrediente_id','=','cardapio_x_ingrediente.ingrediente_id')
		->join('tipo_cardapio','cardapio.cardapio_tipo','=','tipo_cardapio.tipo_cardapio_id')
		->where('cardapio_ativo', '=', '1')->select("*")->get();

	
		$cardapio_antigo="";
		$cont_cardapio=0;	
		$ingrediente_array=array();	
		$retorno_principal=array();		
		foreach($cardapio_listagem as $p){
			
			if($cardapio_antigo==$p->cardapio_descr){
				$retorno_principal[$cont_cardapio]['ingrediente']=$retorno_principal[$cont_cardapio]['ingrediente'].",".$p->ingrediente_descr;
			}else{
				$cont_cardapio++;
				$retorno_principal[$cont_cardapio]['ingrediente']=$p->ingrediente_descr;
				
			}

			$retorno_principal[$cont_cardapio]['nome']=$p->cardapio_descr;
			$retorno_principal[$cont_cardapio]['tipo_cardapio']=$p->tipo_cardapio_descr;
			$retorno_principal[$cont_cardapio]['cardapio_id']=$p->cardapio_id;
			$retorno_principal[$cont_cardapio]['pedido_id']=$pedido_numero;
		
			$cardapio_antigo=$p->cardapio_descr;
		}

	


		return view('pedidos/novo_pedido')->with('retorno_principal',$retorno_principal);
	}



	public function lista_ingredientes($cardapio_id=false,$pedido_id=false){

		if(!$cardapio_id){
			$cardapio_id=Request::route('id');
		$pedido_id=Request::route('id2');
		}
		
		$cardapio=array();


		$carrinho=session()->get('carrinho');


		if(!isset($carrinho)){
			$pedido_cardapio=DB::table('pedido_x_ingrediente')
			->join('cardapio','pedido_x_ingrediente.cardapio_id','=','cardapio.cardapio_id')
			->join('ingrediente','ingrediente.ingrediente_id','=','pedido_x_ingrediente.ingrediente_id')
			->where('cardapio_ativo', '=', '1')
		
			->where('pedido_x_ingrediente.pedido_id','=',$pedido_id)
			->orderBy('cardapio.cardapio_id')
			->select("*")->get();
			$carrinho=session()->get('carrinho');
			if(!$carrinho){
			
			$i=0;
			
			foreach ($pedido_cardapio as $p) {

					

					$carrinho[$i]['ingrediente_id']=$p->ingrediente_id;
					$carrinho[$i]['ingrediente_descr']=$p->ingrediente_descr;
					$carrinho[$i]['ingrediente_valor']=$p->ingrediente_valor;
					$carrinho[$i]['cardapio_descr']=$p->cardapio_descr;
					$carrinho[$i]['cardapio_id']=$p->cardapio_id;
					$carrinho[$i]['pedido_id']=$pedido_id;

					$i++;

			}
				session()->put('carrinho',$carrinho);


			}
		



				$carrinho=session()->get('carrinho');
		}



		return view('pedidos/lista_ingredientes')->with('pedido_id',$pedido_id);



	}
	public function lista_pedido_vendedor(){
		$this->middleware('autorizador');
		$pedido_id=Request::route('pedido_id');

		$pedido_ingrediente=0;
		$registros_ingrediente=DB::table('pedido_x_ingrediente')
		->where('pedido_id','=',$pedido_id)		
		->count();

	
		if($registros_ingrediente>0){
			$pedido_ingrediente=DB::table('pedido_x_ingrediente')
		->join('cardapio','cardapio.cardapio_id','=','pedido_x_ingrediente.cardapio_id')
		->join('pedido','pedido.pedido_id','=','pedido_x_ingrediente.pedido_id')
		->join('tipo_cardapio','cardapio.cardapio_tipo','=','tipo_cardapio.tipo_cardapio_id')

		->join('ingrediente','ingrediente.ingrediente_id','=','pedido_x_ingrediente.ingrediente_id')
			->join('tipo_ingrediente','tipo_ingrediente.tipo_ingr_id','=','ingrediente.ingrediente_tipo')	
		->where('pedido.pedido_id','=',$pedido_id)
		->select('*')->get();

	
	
		}
	
		
	
		return view('pedidos/lista_vendedor')->with('pedido_ingrediente',$pedido_ingrediente);

	}
	public function finaliza_vendedor(){
		$this->middleware('autorizador');
		$pedido_id=Request::route('pedido_id');
		DB::table('pedido')
            ->where('pedido_id', $pedido_id)
			->update(['pedido_status' => 'PENDENTE']);

		return redirect('/');



	}
	public function gerarQR(PedidosRequest $request){

    $params=$request->all();
 	

    $id=$params['pedido_id'];
		QRcode1::QRCODE($id);


	}

	public function salva_pedido(){
		$pedido_id=Request::route('pedido_id');
		DB::table('pedido')
            ->where('pedido_id', $pedido_id)
			->update(['pedido_status' => 'PENDENTE']);

		return redirect('/pedido/lista');
			

	}
	public function excluir(){
		$array_lista=session()->get('carrinho');

		$igrediente_id=Request::route("id");
		$pedido=Request::route("id2");
		$cardapio=Request::route("id3");

		$carrinho=session()->get('carrinho');
		//echo $carrinho[$pedido];

		if(isset($carrinho[$igrediente_id])){
			
			unset($carrinho[$igrediente_id]);
			
			//exit();
		}else
		{	
			
		}


		session()->put('carrinho',$carrinho);


		/*	DB::table('pedido_x_ingrediente')
			->where('pedido_id', '=', $pedido)   
			 ->where('ingrediente_id', '=', $igrediente)        
			->delete();
*/
			return redirect('/pedido/lista_ingredientes/'.$cardapio."&".$pedido);
		
	}

	public function finalizar(){
		$carrinho=session()->get('carrinho');

		$pedido=0;
		if(count($carrinho)>0){
			for($i=0;$i<=max(array_keys($carrinho));$i++){
				if(isset($carrinho[$i])){


				$pedido=$carrinho[$i]['pedido_id'];
				$cardapio_id=$carrinho[$i]['cardapio_id'];
				$ingrediente_id=$carrinho[$i]['ingrediente_id'];

							DB::table('pedido_x_ingrediente')->insert([
    						['pedido_id' => $pedido, 'ingrediente_id'=>$ingrediente_id,'cardapio_id'=>$cardapio_id]]);
				}

			}

			session()->remove('carrinho');
		}

		return view('pedidos/finalizar')->with('pedido',$pedido);
	}
	public function  update(){
		$pedido=Request::route('pedido');
		$cardapio=Request::route('cardapio');

		DB::table('pedido')
		->where('pedido_id','=',$pedido)
		->update(['pedido_status' => 'CRIADO']);

		return redirect('/pedido/lista_ingredientes/'.$cardapio."&".$pedido);
	}
	public function lista_cardapio(){
		$pedido_id=0;
$user=Pedidos::getPedidoSession();

		//PHPSSEID
	
		$pedido_id=Pedidos::getPedido($user);
		$data= Date('Y-m-d H:i:s');
		//INSERT into pedido  (pedido_data,pedido_user,pedido_status,pedido_ativo) values
	
		if($pedido_id<=0){
			 DB::table('pedido')->insert([
    ['pedido_data' => $data, 'pedido_user_temp'=>$user,'pedido_status'=>'CRIADO','pedido_ativo'=>1]]);
			 $pedido_id=Pedidos::getPedido($user);

		}

		$cardapio_pedido_x_ingrediente=DB::table('pedido_x_ingrediente')
		->join('cardapio','cardapio.cardapio_id','=','pedido_x_ingrediente.cardapio_id')
		->join('pedido','pedido.pedido_id','=','pedido_x_ingrediente.pedido_id')
		->join('tipo_cardapio','cardapio.cardapio_id','=','tipo_cardapio.tipo_cardapio_id')
	
		->join('ingrediente','ingrediente.ingrediente_id','=','pedido_x_ingrediente.ingrediente_id')
		->select('*')->get();
	
		$dados=array('cardapio'=>$cardapio_pedido_x_ingrediente);

	
		return view('pedidos/cardapio_listagem')->with('dados',$dados);
	}
	public function lista_item(){
		
	}

	public function lista_pedido(){
		
	}

	public function addCardapio(){
	/*	if(isset(session()->get('carrinho'))){
			$max=max(session()->get('carrinho'));
			echo $max;
			exit();


		}*/
		$carrinho=session()->get('carrinho');
		


	
		$cardapio_id=Request::route('id');
		$pedido_id=Request::route('id2');
	
		$pedido_cardapio=DB::table('cardapio_x_ingrediente')
		->join('cardapio','cardapio.cardapio_id','=','cardapio_x_ingrediente.cardapio_id')
		->join('ingrediente','ingrediente.ingrediente_id','=','cardapio_x_ingrediente.ingrediente_id')
		
		->where('cardapio_ativo', '=', '1')
		->where('cardapio.cardapio_id','=',$cardapio_id)
		->orderBy('cardapio.cardapio_id')
		
		->select("*")->get();
		
		$i=1;	
		foreach ($pedido_cardapio as $p) {
	
	


		if(!isset($carrinho) || count($carrinho)<=0){
			session()->put('carrinho',$carrinho);
			$array_id=$i;
		}else{
			$id= max(array_keys($carrinho));
			$array_id=$id+1;


		}


			$carrinho[$array_id]['ingrediente_id']=$p->ingrediente_id;
					$carrinho[$array_id]['ingrediente_descr']=$p->ingrediente_descr;
					$carrinho[$array_id]['ingrediente_valor']=$p->ingrediente_valor;
					$carrinho[$array_id]['cardapio_descr']=$p->cardapio_descr;
					$carrinho[$array_id]['cardapio_id']=$p->cardapio_id;
					$carrinho[$array_id]['pedido_id']=$pedido_id;

			$i++;
		}



			session()->put('carrinho',$carrinho);
		
			
			return redirect('/pedido/lista_ingredientes/'.$cardapio_id."&".$pedido_id);



	}

		

	
}



/*
Cria novo pedido >
adiciona um item do cardapio <
lista os ingredientes >
adicionar ingrediente ou excluir um  do pedido do cardapio <>
valor <
finalizar pedido, adicionar novo item > 

//STATUS DO PEDIDO
CRIADO >
PENDENTE >
EM PRODUCAO
FEITO 
FINALIZADO 
CANCELADO
//


Criar um novo pedido -> pedido_x_usuario
Pagina para adicionar novos cardapios 
Pagina seleção de cardapio 
Pagina para listagem de itens -> botão para adicionar e excluir 
Pagina para gerenciar pedido ->botão finalizar e botão adicionar



//cardapio_pedido_x_ingrediente
pedido_x_cardapio_x_ingrediente >

pedido_id|cardapio_id|ingrediente_id >
1			1			1
1 			1			2







itens infinitos




*/

?>


