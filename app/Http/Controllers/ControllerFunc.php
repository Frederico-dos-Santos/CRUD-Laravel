<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncFormRequest;
use Illuminate\Http\Request;
use DB;
use App\Models\Funcionario;



class ControllerFunc extends Controller
{
    public function index(Request $request)
    {
        //Pega os dados da tabela funcionario e ordena pelo nome
        $funcionarios = funcionario::query()->orderBy('nome')->get();

        //Adiciona mensagem de sucesso
        //session(['mensagem.sucesso' => 'Funcionário removido com sucesso']);

        //Busca a mensagem de sucesso
        $mensagemSucesso = session('mensagem.sucesso');

        //Apaga a mensagem de sucesso após ela ser exibida, entretanto
        // não é necessária com o uso do flash
       // $request->session()->forget('mensagem.sucesso');

        //Exibe a view de funcionários
        return view('funcionarios.index') ->with('funcionarios', $funcionarios)->with('mensagemSucesso',$mensagemSucesso);
    }

    public function create()
    {
        //Exibe a view de criação
        return view('funcionarios.create');
    }

    public function store(FuncFormRequest $request)
    {
        //Valida os dados enviados, determina regras e caso não seja aprovado redireciona o usuário para a última URL
        //Entretanto o FuncFormRequest ja cria uma validação embutida (Http\Requests)
       /* $request->validate([
            'nome' => ['required', 'min:30'],
            'cargo' => ['required', 'min:30'],
            'salario' => ['required'],
        ]);*/

        //Pega os dados dos inputs e salva no banco de dados
        $funcionario = funcionario::create($request->all());

        //Adiciona mensagem de sucesso
        //$request->session()->flash('mensagem.sucesso', "Funcionárrio '{$funcionario->nome}' criado com sucesso");

        //Redireciona o usuário para a página de funcionários apos a criação de um novo
        return redirect()->route('funcionarios.index')->with('mensagem.sucesso', "Funcionárrio '{$funcionario->nome}' criado com sucesso");

    }

    //Recebe o parâmetro model da url
    //Faz um select no banco
    public function destroy(funcionario $funcionario)
    {
        //Encontra um funcionário baseado no seu id
        //$funcionario = funcionario::find($funcionarios);

        //Pega qual funcionário será apagado
        //Funcionario::destroy($request->funcionario);
        $funcionario->delete();

        //Confirma uma mensagem de sucesso após um funcionário ser apagado
        //$request->session()->flash('mensagem.sucesso', "Funcionário '{$funcionario->nome}' removido com sucesso");

        //Após apagar redireciona para a página de funcionários com dados de flash messages
        return redirect()->route('funcionarios.index')->with('mensagem.sucesso', "Funcionário '{$funcionario->nome}' removido com sucesso");
    }

    public function edit(funcionario $funcionario)
    {
        return view('funcionarios.edit')->with('funcionario', $funcionario);
    }

    public function update(funcionario $funcionario, FuncFormRequest $request)
    {
        $funcionario->fill($request->all());

        $funcionario->save();

        return redirect()->route('funcionarios.index')->with('mensagem.sucesso', "Funcionário '{$funcionario->nome}' atualizado com sucesso");

    }
}
