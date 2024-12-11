@extends('layouts.main')

@section('title', 'Login Medicon')

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100" style="background: url('{{ asset('img/register.jpg') }}') no-repeat center center fixed; background-size: cover ;width: 100%; height: 100vh;">>
        <div class="card" style="max-width: 400px; backgroud: rgba(255, 255, 255, 0.8);">
            <div class="card-body">
                <h2 class="card-title text-center">Login</h2>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form>
                <div class="mt-3 text-center"> 
                    <p>Não tem uma conta? 
                        <a href="{{ route('register') }}">Cadastre-se aqui</a>
                    </p> 
                </div>
            </div>
        </div>
    </div>

@endsection
