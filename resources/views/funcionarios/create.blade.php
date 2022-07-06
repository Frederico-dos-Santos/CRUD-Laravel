<x-layout title="Novo Funcionário">
    <!--Exibe o form de criação.
    A função 'old()' pega da flash session a requisição anterior que foi adicionada pela validação
    Update false nega a tentativa de atualização-->
    <x-funcionarios.form :action="route('funcionarios.store')" :nome="old('nome')" :cargo="old('cargo')" :salario="old('salario')" :update="false"/>
</x-layout>
