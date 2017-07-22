@extends('layouts.app')

@section('content')
@if (Auth::guest())
<div class="container">
    <div class="vertical-center">
        <div class="row">
            <div class="col-sm-4 col-md-offset-4 restrito text-center">
                <h3 class="text-center">Faça o Login ou cadastre-se para continuar</h3>
                <a href="/login" class="btn btn-primary">Login</a>
                <a href="/register" class="btn btn-success">Cadastre-se</a>
            </div>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="vertical-center">
        <div class="row">
            <div class="col-sm-6">
                <h3>Bem-vindo {{ Auth::user()->username }}</h3>
                @if (Auth::user()->active==0)
                    <p class="bg-danger">Por favor acesse seu email e valide sua conta.</p>
                @endif    
            </div>
        </div>
    </div>
</div>
@endif
@endsection
