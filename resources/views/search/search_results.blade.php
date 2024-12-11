@extends('layouts.main')

@section('title', 'Resultados da Busca')

@section('content')
<div class="container mt-5 text-light bg-dark p-5 rounded">
    <h1 class="mb-4">Resultados da Busca para "{{ $query }}"</h1>
    @if($medicos->isEmpty() && $especialidades->isEmpty())
        <p>Nenhum resultado encontrado.</p>
    @else
        <div class="mb-3">
            <h2>Médicos</h2>
            <ul>
                @foreach($medicos as $medico)
                    <li>{{ $medico->nome }}</li>
                @endforeach
            </ul>
        </div>
        <div class="mb-3">
            <h2>Especialidades</h2>
            <ul>
                @foreach($especialidades as $especialidade)
                    <li>{{ $especialidade->nome }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection
