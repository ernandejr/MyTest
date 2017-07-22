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
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                <?php 
                    $email = Auth::user()->email;
                    $grav_url = "https://www.gravatar.com/avatar/".md5( strtolower( trim( $email ) ) ). "?s=120&d=mm&r=g";
                ?>
                <img src="<?php echo $grav_url; ?>" alt="" class="pull-left img-padding"/>
                <p>Nome: {{Auth::user()->name}}</p>
                <p>Email: {{Auth::user()->email}}</p>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
