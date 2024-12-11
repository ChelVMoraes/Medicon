@extends('layouts.main')

@section('title', 'Consultas')

@section('content')
<div class="container mt-5 text-light bg-dark p-5 rounded">
    <h1 class="mb-4">Lista de Consultas</h1>
    <a href="{{ route('consultas.create') }}" class="btn btn-success mb-3">Nova Consulta</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Médico</th>
                <th>Data_consulta</th>
                <th>Data_agendamento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consultas as $consulta)
            <tr>
                <td>{{ $consulta->id }}</td>
                <td>{{ $consulta->paciente->nome }}</td>
                <td>{{ $consulta->medico->nome }}</td>
                <td>{{ $consulta->data_consulta }}</td>
                <td>{{ $consulta->data_agendamento }}</td>
                <td>
                    <a href="{{ route('consultas.show', $consulta->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('consultas.edit', $consulta->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
