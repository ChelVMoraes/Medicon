@extends('layouts.main')

@section('title', 'Editar Consulta')

@section('content')
<div class="container mt-5 text-light bg-dark p-5 rounded">
    <h1 class="mb-4">Editar Consulta</h1>
    <form action="{{ route('consultas.update', $consulta->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select id="paciente_id" name="paciente_id" class="form-select">
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $paciente->id == $consulta->paciente_id ? 'selected' : '' }}>
                        {{ $paciente->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="medico_id" class="form-label">Médico</label>
            <select id="medico_id" name="medico_id" class="form-select">
                @foreach ($medicos as $medico)
                    <option value="{{ $medico->id }}" {{ $medico->id == $consulta->medico_id ? 'selected' : '' }}>
                        {{ $medico->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="data_consulta" class="form-label">Data Consulta</label>
            <input type="datetime-local" id="data_consulta" name="data_consulta" class="form-control" value="{{ $consulta->data }}" required>
        </div>
        <div class="mb-3">
            <label for="data_agendamento" class="form-label">Data Agendamento</label>
            <input type="datetime-local" id="data_agendamento" name="data_agendamento" class="form-control" value="{{ $consulta->data }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>
@endsection
