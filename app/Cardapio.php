<?php

namespace cardapio;

use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
	public $timestamps=false;
	protected $id="cardapio_id";
	protected $fillable= array("cardapio_text","cardapio_status","cardapio_tipo");
    //
}
