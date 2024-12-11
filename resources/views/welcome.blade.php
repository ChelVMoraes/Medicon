@extends('layouts.main')

@section('title', 'Medicon')

@section('content')
<div id="search-container" class="container mt-4 ">
    <div class="row">
        <!-- Card 1 -->
        <div class="col-md-6 mb-3">
            
            <div class="card bg-primary p-3 ">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/consulta.jpg" class="img-fluid rounded-start" alt="Consulta">
                    </div>
                    <div class="col-md-8">
                        <a href="/consultas" class="stretched-link"></a>
                        <div class="card-body">
                            <h5 class="card-title">Consultas</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Card 2 -->
        <div class="col-md-6 mb-3">
            <div class="card bg-secondary text-white p-3">
                
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/med-paciente.jpg" class="img-fluid rounded-start" alt="Médicos">
                    </div>
                    <div class="col-md-8">
                        <a href="/medicos" class="stretched-link"></a>
                        <div class="card-body">
                            <h5 class="card-title">Médicos</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-6 mb-3">
            <div class="card bg-warning text-white p-3">
                
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/medic2.png" class="img-fluid rounded-start" alt="Especialidades">
                    </div>
                    <div class="col-md-8">
                        <a href="/especialidades" class="stretched-link"></a>
                        <div class="card-body">
                            <h5 class="card-title">Especialidades</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="col-md-6 mb-3">
            <div class="card bg-success text-white p-3">
                
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/pacientes.jpg" class="img-fluid rounded-start" alt="Pacientes">
                    </div>
                    <div class="col-md-8">
                        <a href="/pacientes" class="stretched-link"></a>
                        <div class="card-body">
                            <h5 class="card-title">Pacientes</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection