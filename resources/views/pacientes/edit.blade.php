@extends('layouts.main')

@section('title', 'Editar Paciente')

@section('content')
<div class="container mt-5 text-light bg-dark p-5 rounded">
    <h1 class="mb-4">Editar Paciente</h1>
    <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Paciente</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ $paciente->nome }}" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" id="cpf" name="cpf" class="form-control" value="{{ $paciente->cpf }}" required>
        </div>
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" 
    value="{{ \Carbon\Carbon::parse($paciente->data_nascimento)->format('d/m/Y') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
