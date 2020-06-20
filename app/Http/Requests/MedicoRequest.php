<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicoRequest extends FormRequest
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
            'name'=>'required',
            'activities'=>'required',
            'id_user'=>'required',
            'price'=>'required|numeric'
        ];
    }

    public function messages()
    {
        return [
           'name.required' => 'Favor inserir o nome',
           'id_user.required' => 'Favor selecionar o endereço',
           'activities.required' => 'Favor inserir a profissão',
           'price.required' => 'Favor inserir o preço da consulta',
           'price.numeric'  => 'O preço deve ser um valor numérico',
        ];
    }
}
