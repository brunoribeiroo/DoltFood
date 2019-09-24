<?php

namespace cardapio\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use cardapio\Http\Requests\IngredienteRequest;
class ControllerIngrediente extends BaseController
{

    public function __construct()
    {
        $this->middleware('autorizador');
    }
   public function novo1(){

        return view('ingrediente/formulario');
    }


    public function novo(){
    	   $html="";
        $tipo_ingrediente= DB::select("SELECT * from tipo_ingrediente");
        //$produtos=Cardapio::all();
        return view('ingrediente/formulario')->with('tipo_ingrediente',$tipo_ingrediente);
    }
    public function adiciona(IngredienteRequest $request){
    	 $ingrediente = DB::table('ingrediente')->get();



    $params=$request->all();
 	

    $ingrediente_descr=$params['nome_ingrediente'];
    $ingrediente_valor=$params['valor_ingrediente'];
    $ingrediente_tipo=$params['tipo_ingrediente'];


    $ingrediente_valor=str_replace(",", ".", $ingrediente_valor);

    DB::table('ingrediente')->insert([
    ['ingrediente_descr' => $ingrediente_descr, 'ingrediente_valor' => $ingrediente_valor,'ingrediente_tipo'=>$ingrediente_tipo]
]);


          return redirect('ingrediente/');
    }

    public function listagem(){
        $html="";
     //   $produtos= DB::select("SELECT * from cardapio");
        //$produtos=Cardapio::all();


        $ingrediente = DB::table('ingrediente')
        ->join('tipo_ingrediente', 'ingrediente.ingrediente_tipo', '=', 'tipo_ingrediente.tipo_ingr_id')
        ->select('ingrediente_id','ingrediente_descr', 'ingrediente_tipo','ingrediente_valor','tipo_ingr_descr','ingrediente_ativo')->get();


        

        return view('ingrediente/listagem')->with('ingrediente',$ingrediente);


    }


    public function excluir(){
        $id_ingrediente=Request::route('id');
           DB::table('ingrediente')->where('ingrediente_id', '=', $id_ingrediente)        
        ->delete();

$ingrediente = DB::table('ingrediente')
        ->join('tipo_ingrediente', 'ingrediente.ingrediente_tipo', '=', 'tipo_ingrediente.tipo_ingr_id')
        ->select('ingrediente_id','ingrediente_descr', 'ingrediente_tipo','ingrediente_valor','tipo_ingr_descr','ingrediente_ativo')->get();

        return view('ingrediente/listagem')->with('ingrediente',$ingrediente);
    }

	}