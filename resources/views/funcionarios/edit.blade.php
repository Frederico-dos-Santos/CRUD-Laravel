<x-layout title="Editar Funcionário '{{$funcionario->nome}}'">
    <!--Exibe o form de atualização.
    update true confirma para o form que existe uma tentativa de atualização
   -->
    <x-funcionarios.form :action="route('funcionarios.update', $funcionario->id)" :nome="$funcionario->nome" :cargo="$funcionario->cargo" :salario="$funcionario->salario" :update="true"/>
</x-layout>
