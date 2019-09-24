<?php
namespace cardapio\Http\Controllers\Classes;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\Response\QrCodeResponse;
class QRcode1  {
	 public static function QRCODE(){

		$qrCode = new QrCode('https://www.google.com');
		$qrCode->setSize(300);
		$qrCode->setMargin(10);
		$qrCode->setEncoding('UTF-8');
		$qrCode->setLogoSize(150, 200);
		$qrCode->setRoundBlockSize(false);
		$qrCode->setValidateResult(false);
		$qrCode->setWriterOptions(['exclude_xml_declaration' => true]);
// Set advanced options
		$qrCode->setWriterByName('svg');

		header('Content-Type: '.$qrCode->getContentType());

		echo $qrCode->writeString();

    }
}



?>