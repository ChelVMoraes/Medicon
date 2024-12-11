@extends('layouts.main')

@section('title', 'Registro Medicon')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100" style="background: url('{{ asset('img/register.jpg') }}') no-repeat center center fixed; background-size: cover ;width: 100%; height: 100vh;"> 
    <div class="card w-100" style="max-width: 400px; backgroud: rgba(255, 255, 255, 0.8);"> 
        <div class="card-body"> 
            <h2 class="card-title text-center">Cadastro</h2> 
            @if ($errors->any()) 
            <div class="alert alert-danger"> 
                <ul> 
                    @foreach ($errors->all() as $error) 
                    <li>{{ $error }}</li> 
                    @endforeach 
                </ul> 
            </div> 
            @endif 
            <form action="{{ route('register') }}" method="POST"> 
                @csrf 
                <div class="form-group"> 
                    <label for="name">Nome:</label> 
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required> 
                </div> 
                <div class="form-group"> 
                    <label for="email">Email:</label> 
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required> 
                </div> 
                <div class="form-group"> 
                    <label for="password">Senha:</label> 
                    <input type="password" name="password" class="form-control" required> 
                </div> 
                <div class="form-group"> 
                    <label for="password_confirmation">Confirme a Senha:</label> 
                    <input type="password" name="password_confirmation" class="form-control" required> 
                </div> 
                <button type="submit" class="btn btn-primary btn-block">Cadastrar</button> 
            </form> 
        </div> 
    </div> 
</div>


@endsection