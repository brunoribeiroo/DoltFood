<?php

namespace cardapio\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use cardapio\Http\Requests\TipoIngredienteRequest;
use cardapio\Http\Controllers\Classes\QRcode1;


class ControllerTipoIngrediente		 extends Controller
{
    public function __construct()
    {
        $this->middleware('autorizador');
         QRcode1::QRCODE();
    }
	//use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
  public function novo(){
         return view('tipo_ingrediente/formulario');
    }

    public function adiciona(){
    	 $ingrediente = DB::table('tipo_ingrediente')->get();
    	 $params=Request::all();


    $nome_tipo_ingrediente=$params['nome_tipo_ingrediente'];
  

    DB::table('tipo_ingrediente')->insert([
    ['tipo_ingr_descr' => $nome_tipo_ingrediente]
]);



          return redirect('tipo_ingrediente/');
    }

    public function listagem(){
           $tipo_ingrediente = DB::table('tipo_ingrediente')
                ->select('tipo_ingr_id','tipo_ingr_descr', 'tipo_ingr_ativo')->get();       

        return view('tipo_ingrediente/listagem')->with('tipo_ingrediente',$tipo_ingrediente); 



    }


    public function QRCODE(){        
$qrCode2 = new QrCode('https://www.googlsse.com');
$qrCode2->setSize(300);
$qrCode2->setMargin(10);
$qrCode2->setEncoding('UTF-8');
$qrCode2->setLogoSize(150, 200);
$qrCode2->setRoundBlockSize(false);
$qrCode2->setValidateResult(false);
$qrCode2->setWriterOptions(['exclude_xml_declaration' => true]);
// Set advanced options
$qrCode2->setWriterByName('png');
header('Content-Type: '.$qrCode2->getContentType());

echo $qrCode2->writeString();
    
    }

}
