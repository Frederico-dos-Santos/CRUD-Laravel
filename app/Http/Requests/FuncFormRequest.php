<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncFormRequest extends FormRequest
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
        //Determina as regras padrão de dados
        return [
            'nome' => ['required', 'max:50'],
            'cargo' => ['required', 'max:50'],
            'salario' => ['required', 'min:3', 'max:10']
        ];
    }

    //Determina as frases de exceptions dos erros
    /*public function messages()
    {
        return [
            'nome.required' => "O campo 'Nome' é obrigatório",
            'nome.max' => "O campo 'Nome' é limitado em :max caracteres",

            'cargo.required' => "O campo 'Cargo' é obrigatório",
            'cargo.max' => "O campo 'Cargo' é limitado em :max caracteres",

            'salario.required' => "O campo 'Salario' é obrigatório",
            'salario.max' => "O campo 'Salário' é limitado em :max caracteres",
            'salario.min' => "O campo 'Salário' precisa de no mínimo :min caracteres",
        ];
    }*/
}
