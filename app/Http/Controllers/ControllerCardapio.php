<?php


namespace cardapio\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;    
use Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use cardapio\Http\Requests\CardapioRequest;
use cardapio\Http\Controllers\Classes\QRcode1;


class ControllerCardapio extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
      public function __construct()
    {


        $this->middleware('autorizador');
        

    }
    public function novo(){
    	   $html="";

        $tipo_cardapio= DB::select("SELECT * from tipo_cardapio");
        
        return view('cardapio/formulario')->with('tipo_cardapio',$tipo_cardapio);
    }
    public function adiciona(){
    $cardapio = DB::table('cardapio')->get();
    $cardapio_user=\Auth::user()->id;
    $cardapio_data_criacao=Date('Y-m-d H:i:s');

    $params=Request::all();
 	
    $cardapio_descr=$params['nome_cardapio'];   
    $cardapio_tipo=$params['tipo_cardapio'];

    $file = Request::file('image');
   
    $file_2 = Request::hasFile('image');
    

   

    DB::table('cardapio')->insert([
    ['cardapio_descr' => $cardapio_descr, 'cardapio_tipo'=>$cardapio_tipo,'cardapio_user'=>$cardapio_user,'cardapio_data_criacao'=>$cardapio_data_criacao]
]);

        $cardapio_imagem = DB::table('cardapio')
        ->max('cardapio_id');

        $upload =$file->storeAs('cardapio', 'cardapio_'.$cardapio_imagem.'.png');
        

          return redirect('cardapio/');
    }

    public function listagem(){
        $html="";


        $cardapio = DB::table('cardapio')
        ->join('login', 'cardapio.cardapio_user', '=', 'login.id')
        ->join('tipo_cardapio', 'cardapio.cardapio_tipo', '=', 'tipo_cardapio.tipo_cardapio_id')
        ->select('login_user','cardapio_descr', 'cardapio_tipo','cardapio_valor','tipo_cardapio_descr','cardapio_ativo','cardapio_id')->get();


        

        return view('cardapio/listagem')->with('cardapio',$cardapio);


    }
    public function excluir(){
        $id_cardapio=Request::route('id');
    
        $id_ingrediente=Request::route('id2');
 

        DB::table('cardapio_x_ingrediente')->where('cardapio_id', '=', $id_cardapio)
        ->where('ingrediente_id', '=', $id_ingrediente)
        ->delete();
        $data=$this->monta_registro($id_cardapio);
        if(count($data)>0){
           
            return redirect('cardapio/monta/'.$id_cardapio);
             //return 1;
        }else{
              return redirect('cardapio/');

        }
            return 1;
    }

    public function monta_registro($cardapio_id){
        $data=0;

        $ingrediente=DB::table('ingrediente')
        ->where('ingrediente_ativo','1')
        ->select('ingrediente_id','ingrediente_descr')->get();

        $cardapio_montado= DB::table('cardapio_x_ingrediente')
        ->where('cardapio_x_ingrediente.cardapio_id','=',$cardapio_id)
        ->join('cardapio','cardapio_x_ingrediente.cardapio_id','=','cardapio.cardapio_id')
        ->join('ingrediente','cardapio_x_ingrediente.ingrediente_id','=','ingrediente.ingrediente_id')
        ->join('tipo_ingrediente','ingrediente.ingrediente_tipo','=','tipo_ingrediente.tipo_ingr_id')
        ->select('cardapio.cardapio_id','ingrediente.ingrediente_id','cardapio_descr','cardapio_valor','ingrediente_descr','ingrediente_valor','tipo_ingr_descr')->get();

           $data=array('id'=>$cardapio_id,
                    'ingrediente'=>$ingrediente,
                    'cardapio_montado'=>$cardapio_montado);

           return $data;

    }
    public function monta(){
        $id=Request::route('id');


        $data=$this->monta_registro($id);

        return view('cardapio/monta_cardapio')->with($data);
    }

    public function monta_cardapio(){

        $params=Request::all();
     
        $id_ingrediente=$params['ingrediente_id'];
        $id_cardapio=$params['cardapio_id'];



           DB::table('cardapio_x_ingrediente')->insert([
    ['cardapio_id' => $id_cardapio, 'ingrediente_id'=>$id_ingrediente]
]);

        $data=$this->monta_registro($id_cardapio);
        return view('cardapio/monta_cardapio')->with($data);
    }

}
