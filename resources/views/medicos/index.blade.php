@extends('layouts.main')

@section('title', 'Lista de Médicos')

@section('content')
<div class="container mt-5 text-light bg-dark p-5 rounded">
    <h1 class="mb-4">Lista de Médicos</h1>
    <a href="{{ route('medicos.create') }}" class="btn btn-success mb-3">Novo Médico</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>CRM</th>
                <th>Especialidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($medicos as $medico)
                <tr>
                    <td>{{ $medico->id }}</td>
                    <td>{{ $medico->nome }}</td>
                    <td>{{ $medico->crm }}</td>
                    <td>{{ $medico->especialidade->nome ?? 'Sem especialidade' }}</td>
                    <td>
                        <a href="{{ route('medicos.show', $medico->id) }}" class="btn btn-info btn-sm">Visualizar</a>
                        <a href="{{ route('medicos.edit', $medico->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Deseja realmente excluir este médico?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Nenhum médico cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
