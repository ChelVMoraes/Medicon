@extends('layouts.main')

@section('title', 'Telefones de ' . $paciente->nome)

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Telefones de {{ $paciente->nome }}</h1>
    <a href="{{ route('pacientes.telefones.create', $paciente) }}" class="btn btn-success mb-3">Adicionar Telefone</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Número</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($telefones as $telefone)
            <tr>
                <td>{{ $telefone->id }}</td>
                <td>{{ $telefone->numero }}</td>
                <td>
                    <a href="{{ route('pacientes.telefones.edit', [$paciente, $telefone]) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('pacientes.telefones.destroy', [$paciente, $telefone]) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este telefone?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Nenhum telefone cadastrado.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
