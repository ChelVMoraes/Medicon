@extends('layouts.main')

@section('title', 'Lista de Pacientes')

@section('content')
<div class="container mt-5 text-light bg-dark p-5 rounded">
    <h1 class="mb-4">Pacientes</h1>
    <a href="{{ route('pacientes.create') }}" class="btn btn-success mb-3">Novo Paciente</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pacientes as $paciente)
            <tr>
                <td>{{ $paciente->id }}</td>
                <td>{{ $paciente->nome }}</td>
                <td>{{ $paciente->cpf }}</td>
                <td>{{ $paciente->data_nascimento ? $paciente->data_nascimento->format('d/m/Y') : 'Data não informada' }}</td>
                <td>
                    <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este paciente?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Nenhum paciente cadastrado.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
