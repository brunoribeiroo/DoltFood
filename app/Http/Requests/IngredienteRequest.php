<?php

namespace cardapio\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngredienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome_ingrediente'=>'required',
            'valor_ingrediente'=>'required|numeric',
            'tipo_ingrediente'=>'required'
        ];
    }
}
