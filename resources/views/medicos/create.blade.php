@extends('layouts.main')

@section('title', 'Adicionar Médico')

@section('content')
<div class="container mt-5 text-light bg-dark p-5 rounded">
    <h1 class="mb-4">Novo Médico</h1>
    <form action="{{ route('medicos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Médico</label>
            <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome do médico" required>
        </div>
        <div class="mb-3">
            <label for="crm" class="form-label">CRM</label>
            <input type="text" id="crm" name="crm" class="form-control" placeholder="Digite o CRM do médico" required>
        </div>
        <div class="mb-3">
            <label for="especialidade_id" class="form-label">Especialidade</label>
            <select id="especialidade_id" name="especialidade_id" class="form-select" required>
                <option value="" selected disabled>Selecione uma especialidade</option>
                @foreach ($especialidades as $especialidade)
                    <option value="{{ $especialidade->id }}">{{ $especialidade->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
