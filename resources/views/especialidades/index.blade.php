@extends('layouts.main')

@section('title', 'Lista de Especialidades')

@section('content')
<div class="container mt-5 text-light bg-dark p-5 rounded">
    <h1 class="mb-4">Lista de Especialidades</h1>
    <a href="{{ route('especialidades.create') }}" class="btn btn-success mb-3">Nova Especialidade</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($especialidades as $especialidade)
                <tr>
                    <td>{{ $especialidade->id }}</td>
                    <td>{{ $especialidade->nome }}</td>
                    <td>
                        <a href="{{ route('especialidades.show', $especialidade->id) }}" class="btn btn-info btn-sm">Visualizar</a>
                        <a href="{{ route('especialidades.edit', $especialidade->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('especialidades.destroy', $especialidade->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Deseja realmente excluir esta especialidade?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Nenhuma especialidade cadastrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
