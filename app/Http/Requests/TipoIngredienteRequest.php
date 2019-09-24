<?php

namespace cardapio\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoIngredienteRequest extends FormRequest
{
  
    public function authorize()
    {
        return false;
    }

  
    public function rules()
    {
        return [
            //
        ];
    }
}
