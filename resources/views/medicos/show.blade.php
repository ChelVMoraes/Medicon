@extends('layouts.main')

@section('title', 'Detalhes do Médico')

@section('content')
<div class="container mt-5 text-light bg-dark p-5 rounded">
    <h1 class="mb-4">Detalhes do Médico</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nome:</h5>
            <p class="card-text">{{ $medico->nome }}</p>

            <h5 class="card-title">CRM:</h5>
            <p class="card-text">{{ $medico->crm }}</p>

            <h5 class="card-title">Especialidade:</h5>
            <p class="card-text">{{ $medico->especialidade->nome ?? 'Sem especialidade' }}</p>

            <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Voltar</a>
            <a href="{{ route('medicos.edit', $medico->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Deseja realmente excluir este médico?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
</div>
@endsection
