<?php
namespace cardapio\Http\Controllers\Classes;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\Response\QrCodeResponse;
class QRcode1  {
	 public static function QRCODE($id){

		$qrCode = new QrCode('http://192.168.15.10:8000/pedido/lista_vendedor/'.$id);
		$qrCode->setSize(300);
		$qrCode->setMargin(10);
		$qrCode->setEncoding('UTF-8');
		$qrCode->setLogoSize(150, 200);
		$qrCode->setRoundBlockSize(false);
		$qrCode->setValidateResult(false);
		$qrCode->setWriterOptions(['exclude_xml_declaration' => true]);
// Set advanced options
		$qrCode->setWriterByName('svg');


		echo $qrCode->writeString();

    }
}



?>