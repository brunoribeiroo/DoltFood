<?php

namespace ingrediente;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
	public $timestamps=false;
	protected $id="ingrediente_id";
	protected $fillable= array("ingrediente_descr","ingrediente_tipo","ingrediente_valor");
    //
}
