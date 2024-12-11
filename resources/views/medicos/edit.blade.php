@extends('layouts.main')

@section('title', 'Editar Médico')

@section('content')
<div class="container mt-5 text-light bg-dark p-5 rounded">
    <h1 class="mb-4">Editar Médico</h1>
    <form action="{{ route('medicos.update', $medico->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Médico</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ $medico->nome }}" required>
        </div>
        <div class="mb-3">
            <label for="crm" class="form-label">CRM</label>
            <input type="text" id="crm" name="crm" class="form-control" value="{{ $medico->crm }}" required>
        </div>
        <div class="mb-3">
            <label for="especialidade_id" class="form-label">Especialidade</label>
            <select id="especialidade_id" name="especialidade_id" class="form-select">
                @foreach ($especialidades as $especialidade)
                    <option value="{{ $especialidade->id }}" {{ $especialidade->id == $medico->especialidade_id ? 'selected' : '' }}>
                        {{ $especialidade->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
