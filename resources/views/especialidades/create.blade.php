@extends('layouts.main')

@section('title', 'Adicionar Especialidade')

@section('content')
<div class="container mt-5 text-light bg-dark p-5 rounded">
    <h1 class="mb-4">Nova Especialidade</h1>
    <form action="{{ route('especialidades.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Especialidade</label>
            <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome da especialidade" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
