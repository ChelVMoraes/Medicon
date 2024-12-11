@extends('layouts.main')

@section('title', 'Editar Especialidade')

@section('content')
<div class="container mt-5 text-light bg-dark p-5 rounded">
    <h1 class="mb-4">Editar Especialidade</h1>
    <form action="{{ route('especialidades.update', $especialidade->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Especialidade</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ $especialidade->nome }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('especialidades.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

@endsection