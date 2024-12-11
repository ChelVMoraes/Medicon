@extends('layouts.main')

@section('title', 'Detalhes da Consulta')

@section('content')
<div class="container mt-5 text-light bg-dark p-5 rounded">
    <h1 class="mb-4">Detalhes da Consulta</h1>
    <p><strong>ID:</strong> {{ $consulta->id }}</p>
    <p><strong>Paciente:</strong> {{ $consulta->paciente->nome }}</p>
    <p><strong>Médico:</strong> {{ $consulta->medico->nome }}</p>
    <p><strong>Data_consulta:</strong> {{ $consulta->data }}</p>
    <p><strong>Data_agendamento:</strong> {{ $consulta->data }}</p>
    <a href="{{ route('consultas.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
