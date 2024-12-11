@extends('layouts.main')

@section('title', 'Editar Telefone')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Editar Telefone</h1>
    <form action="{{ route('pacientes.telefones.update', [$paciente, $telefone]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="numero" class="form-label">Número de Telefone</label>
            <input type="text" id="numero" name="numero" class="form-control" value="{{ $telefone->numero }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="{{ route('pacientes.telefones.index', $paciente) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
