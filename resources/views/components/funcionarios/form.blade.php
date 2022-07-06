
    <form action="{{$action}}" method="post">
        @csrf

        <!-- Verifica se o update é verdadeiro -->
        @if($update)
         <!-- Atualizar dado -->
            @method('PUT')
        @endif

        <div class="mb-3">
            <lable for="nome" class="form-label">Nome:</lable>
            <input type="text" id="nome" name="nome" class="form-control" @isset($nome)value="{{$nome}}" @endisset>

            <lable for="Cargo" class="form-label">Cargo:</lable>
            <input type="text" id="cargo" name="cargo" class="form-control" @isset($cargo)value="{{$cargo}}" @endisset>

            <lable for="Salario" class="form-label">Salário:</lable>
            <input type="number" id="salario" name="salario" class="form-control" @isset($salario)value="{{$salario}}" @endisset>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

