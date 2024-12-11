<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Medicon Consultas')</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100 bg-light text-dark" style="background: url('{{ asset('img/sua-imagem.jpg') }}') no-repeat center center fixed; background-size: cover;"> 
    <header> 
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
            <div class="container-fluid "> 
                <a class="navbar-brand" href="/"> 
                    <img src="/img/medic1.jpeg" alt="Logo" width="120" height="84" class="d-inline-block align-text-center"> 
                    <span class="ms-2 fs-3 fw-bold text-danger">Medicon &copy</span> 
                </a> 
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> 
                    <span class="navbar-toggler-icon"></span> 
                </button> 
                <div class="collapse navbar-collapse" id="navbarNav"> 
                    <form class="d-flex" role="search" action="{{ route('search') }}" method="GET">
                        <input class="form-control-sm me-2" type="search" name="query" placeholder="Pesquisar.." aria-label="Search">
                        <button class="btn btn-outline-success btn-sm" type="submit">Médico ou Especialidade</button>
                    </form>
                    <ul class="nav nav-tabs ms-auto"> 
                        <li class="nav-item"> 
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="{{ Request::is('/') ? 'page' : '' }}" href="/">Home</a> 
                        </li> 
                        <li class="nav-item"> 
                            <a class="nav-link {{ Request::is('consultas') ? 'active' : '' }}" aria-current="{{ Request::is('consultas') ? 'page' : '' }}" href="/consultas">Consultas</a> 
                        </li> 
                        <li class="nav-item"> <a class="nav-link {{ Request::is('especialidades') ? 'active' : '' }}" aria-current="{{ Request::is('especialidades') ? 'page' : '' }}" href="/especialidades">Especialidades</a> 
                        </li> 
                        @auth 
                        <li class="nav-item"> 
                            <form action="/logout" method="POST"> 
                                @csrf 
                                <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a> 
                            </form> 
                        </li> 
                        @endauth 
                        @guest 
                        <li class="nav-item"> 
                            <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" aria-current="{{ Request::is('login') ? 'page' : '' }}" href="/login">Entrar</a> 
                        </li> 
                        <li class="nav-item"> 
                            <a class="nav-link {{ Request::is('register') ? 'active' : '' }}" aria-current="{{ Request::is('register') ? 'page' : '' }}" href="/register">Cadastrar</a> 
                        </li> 
                        @endguest 
                    </ul> 
                    
                </div> 
            </div> 
        </nav> 
    </header> 
    <main class="flex-grow-1"> 
        @yield('content') 
    </main>

    <!-- Footer Condicional -->
    @if(Route::currentRouteName() == 'welcome')

    <footer class="bg-dark text-light text-center py-4">
        <div class="container">
            <div class="row">
                <!-- Sobre a Clínica -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase fw-bold">Sobre a Clínica</h5>
                    <p>
                        A Medicon oferece atendimento médico especializado com uma equipe altamente qualificada. 
                        Cuidamos da sua saúde com atenção e qualidade.
                    </p>
                </div>
    
                <!-- Contato -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase fw-bold">Contato</h5>
                    <p><i class="bi bi-geo-alt-fill"></i> Rua Saúde, 123, Centro, Curitiba - PR</p>
                    <p><i class="bi bi-telephone-fill"></i> (41) 1234-5678</p>
                    <p><i class="bi bi-envelope-fill"></i> contato@clinica-medicon.com</p>
                </div>
    
                <!-- Links Úteis -->
                <div class="col-md-4 mb-4 text-light">
                    <h5 class="text-uppercase fw-bold">Links Úteis</h5>
                    <ul class="list-unstyled">
                        <li><a href="/consultas" class="text-light text-decoration-none">Agendamento</a></li>
                        <li><a href="/especialidades" class="text-light text-decoration-none">Especialidades</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Convênios</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Sobre Nós</a></li>
                    </ul>
                </div>
            </div>
    
            <div class="row mt-4 text-light align-items-center">
                <!-- Redes Sociais -->
                <div class="col-md-6">
                    <h6 class="text-uppercase fw-bold">Siga-nos</h6>
                    <a href="#" class="text-light me-3"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-light me-3"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-light me-3"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="text-light me-3"><i class="bi bi-twitter"></i></a>
                </div>
    
                <!-- Copyright -->
                <div class="mt-3">
                    <p class="mb-0">&copy; 2024 Medicon. Todos os direitos reservados.</p>
                </div>
            </div>
        </div>
    </footer>
    @endif
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="{{ asset('js/scripts.js') }}"></script>
    @yield('scripts')

</body>

</html>
