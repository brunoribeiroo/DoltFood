<?php

namespace cardapio\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homepage(){
    	$variavel= "HomePage - Sistema Cardapio";
    	return view('welcome',[
    		'title'=>$variavel
    	]);

    }
    public function listagem(){
        $html="";
     //   $produtos= DB::select("SELECT * from cardapio");
        //$produtos=Cardapio::all();

     
    
        $ingrediente = DB::table('ingrediente')
        ->join('tipo_ingrediente', 'ingrediente.ingrediente_tipo', '=', 'tipo_ingrediente.tipo_ingr_id')
        ->select('ingrediente_id','ingrediente_descr', 'ingrediente_tipo','ingrediente_valor','tipo_ingr_descr','ingrediente_ativo')->get();


        /*
        multiplas views 

        return view('view','groups'=>$groups,'user_list'>[1],'instituition_list'=>[1])



        */
        
        
        
        

        return view('ingrediente/listagem')->with('ingrediente',$ingrediente);
    }
    public function cadastrar(){
    	echo 'Tela de Cadastro';    	
    }

    public function mostra(){
        $id=Request::route('id');
        $produtos= DB::select("SELECT * from cardapio where cardapio_id=?",[$id]);
        //$produtos=Cardapio::find($cardapio_id);
     

        return view('produto/detalhes')->with('p',$produtos[0]);
    }

    public function novo(){
        return view('produto/formulario');
    }

   public function adiciona(){
        //pegar informações do formulario
        $params=Request::all();
        //$cardapio=new Cardapio($params);  
        
        
        //$cardapio->save();
        //iserir
       DB::insert("INSERT INTO cardapio_main (cardapio_text,cardapio_status,cardapio_tipo) values (?,?,?)",array($cardapio_text,$status,$tipo));

        return redirect('/');
   }
   public function remove(){
    $id=Request::route('id');
    $produto=Cardapio::find($id);
    $produto->delete();
   }
}
