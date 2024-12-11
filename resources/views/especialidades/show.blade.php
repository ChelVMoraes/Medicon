@extends('layouts.main')

@section('title', 'Detalhes da Especialidade')

@section('content')
<div class="container mt-5 text-light bg-dark p-5 rounded">
    <h1 class="mb-4">Detalhes da Especialidade</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nome:</h5>
            <p class="card-text">{{ $especialidade->nome }}</p>
            <a href="{{ route('especialidades.index') }}" class="btn btn-secondary">Voltar</a>
            <a href="{{ route('especialidades.edit', $especialidade->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('especialidades.destroy', $especialidade->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Deseja realmente excluir esta especialidade?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
</div>
@endsection
