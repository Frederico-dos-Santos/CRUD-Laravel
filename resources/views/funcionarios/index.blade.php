<x-layout title="Funcionários">

    <p>Algum funcionário ainda não está na lista?</p>
    <a href="{{route('funcionarios.create')}}" class="btn btn-dark mb-2">Adicionar</a>

    <!--Diretiva do blade para criar um if-->
    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{$mensagemSucesso}}
    </div>
    @endisset
    <p>Lista de funcionários da empresa:</p>
    <div>

    <table class="table">
        <tr>
            <th>NOME</th>
            <th>CARGO</th>
            <th>SALÁRIO</th>
            <th></th>
        </tr>
        @foreach ($funcionarios as $funcionario)
            <tr>
                <td>{{$funcionario->nome}}</td>
                <td>{{$funcionario->cargo}}</td>
                <td>{{$funcionario->salario}}</td>
                <td>
                    <span class="d-flex">
                        <a href="{{route('funcionarios.edit', $funcionario->id)}}" class="btn btn-primary btn-sm">E</a>

                        <form action="{{route('funcionarios.destroy', $funcionario->id)}}" method="post" class="ms-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">X</button>
                        </form>
                    </span>
                </td>
            </tr>
        @endforeach
    </table>
    </div>

</x-layout>

