@extends('layouts.main')

@section('title', 'Adicionar Telefone para ' . $paciente->nome)

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Adicionar Telefone</h1>
    <form action="{{ route('pacientes.telefones.store', $paciente) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="numero" class="form-label">Número de Telefone</label>
            <input type="text" id="numero" name="numero" class="form-control" placeholder="Digite o número de telefone" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('pacientes.telefones.index', $paciente) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
