@extends('layouts.main')

@section('title', 'Adicionar Paciente')

@section('content')
<div class="container mt-5 text-light bg-dark p-5 rounded">
    <h1 class="mb-4">Novo Paciente</h1>
    <form action="{{ route('pacientes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Paciente</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome') }}" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Digite o CPF do paciente" required>
        </div>
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="data_cadastro" class="form-label">Data do Cadastro</label>
            <input type="date" id="data_cadastro" name="data_cadastro" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" id="cep" name="cep" class="form-control" value="{{ old('cep') }}" placeholder="00000-000" maxlength="9" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" id="endereco" name="endereco" class="form-control" value="{{ old('endereco') }}" required>
        </div>
        <div class="mb-3">
            <label for="numero" class="form-label">Número</label>
            <input type="text" id="numero" name="numero" class="form-control" value="{{ old('numero') }}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('cep').addEventListener('blur', buscarCEP);

    function buscarCEP() {
        const cep = document.getElementById('cep').value.replace(/\D/g, '');

        if (cep.length !== 8) {
            alert('Por favor, insira um CEP válido.');
            return;
        }

        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => {
                if (!response.ok) throw new Error('Erro ao buscar o CEP.');
                return response.json();
            })
            .then(data => {
                if (data.erro) throw new Error('CEP não encontrado.');

                // Preenchendo os campos com os dados da API
                document.getElementById('endereco').value = `${data.logradouro}, ${data.bairro}, ${data.localidade} - ${data.uf}`;
            })
            .catch(error => {
                console.error(error);
                alert('Erro ao buscar informações do CEP. Verifique o valor e tente novamente.');
            });
    }
</script>
@endsection
