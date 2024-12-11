@extends('layouts.main')

@section('title', 'Detalhes do Paciente')

@section('content')
<div class="container mt-5 text-light bg-dark p-5 rounded">
    <h1 class="mb-4">Detalhes do Paciente</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $paciente->nome }}</h5>
            <p class="card-text"><strong>CPF:</strong> {{ $paciente->cpf }}</p>
            <p class="card-text"><strong>Data de Nascimento:</strong> {{ \Carbon\Carbon::parse($paciente->data_nascimento)->format('d/m/Y') }}</p>
            <a href="{{ route('pacientes.index') }}" class="btn btn-success">Voltar</a>
        </div>
    </div>
</div>
@endsection
