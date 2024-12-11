@extends('layouts.main')

@section('title', 'Criar Consulta')

@section('content')
<div class="container mt-5 text-light bg-dark p-5 rounded">
    <h1 class="mb-4">Nova Consulta</h1>
    <form action="{{ route('consultas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select id="paciente_id" name="paciente_id" class="form-select bg-dark text-light">
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="medico_id" class="form-label">Médico</label>
            <select id="medico_id" name="medico_id" class="form-select bg-dark text-light">
                @foreach ($medicos as $medico)
                    <option value="{{ $medico->id }}">{{ $medico->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="data_consulta" class="form-label">Data da Consulta</label>
            <input type="datetime-local" id="data_consulta" name="data_consulta" class="form-control bg-dark text-light" required>
        </div>
        <div class="mb-3">
            <label for="data_agendamento" class="form-label">Data de Agendamento</label>
            <input type="datetime-local" id="data_agendamento" name="data_agendamento" class="form-control bg-dark text-light" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
