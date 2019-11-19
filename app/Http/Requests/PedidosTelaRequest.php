<?php

namespace cardapio\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PedidosTelaRequest extends FormRequest
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
            'pedido_id'=>'required',
            'cardapio_id'=>'required',
            'tempo_final'=>'required'
        ];
    }
}
