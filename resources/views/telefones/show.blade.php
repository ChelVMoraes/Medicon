@extends('layouts.main')

@section('title', 'Detalhes do Telefone')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Detalhes do Telefone</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Número de Telefone</h5>
            <p class="card-text"><strong>Número:</strong> {{ $telefone->numero }}</p>
            <p class="card-text"><strong>Paciente:</strong> {{ $telefone->paciente->nome }}</p>
        </div>
    </div>
    <div class="mt-3">
        <a href="{{ route('pacientes.telefones.index', $telefone->paciente) }}" class="btn btn-secondary">Voltar para a lista</a>
        <a href="{{ route('pacientes.telefones.edit', [$telefone->paciente, $telefone]) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('pacientes.telefones.destroy', [$telefone->paciente, $telefone]) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este telefone?')">Excluir</button>
        </form>
    </div>
</div>
@endsection
