@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" id="register">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id="enviar">
                                    <i class="fa fa-btn fa-user"></i> Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
                $(function() {
                    $("#register").validate({
                        rules: {
                            name: {
                                required: true
                            },
                            username: {
                                required: true
                            },
                            password: {
                                required: true,
                                pwma: true,
                                pwmi: true,
                                pwn: true,
                                minlength: 6
                            },
                            email: {
                                required: true,
                                email: true
                            }
                        },
                        messages: {
                            name: {
                                required: "Campo requerido"
                            },
                            surname: {
                                required: "Campo requerido"
                            },
                            username: {
                                required: "Campo requerido"
                            },
                            password: {
                                required: "Campo requerido",
                                pwma: "A senha deve conter pelo menos uma letra maiusula",
                                pwmi: "A senha deve conter pelo menos uma letra minuscula",
                                pwn: "A senha deve conter pelo menos um número",
                                minlength: "A senha deve conter pelo menos 6 caracteres"
                            },
                            email: {
                                required: "Campo requerido",
                                email: "Formato inválido"
                            }
                        }
                    });

                    $.validator.addMethod("pwma", function(value) {
                        return /[A-Z]/.test(value) // has a uppercase letter
                    });
                    $.validator.addMethod("pwmi", function(value) {
                        return /[a-z]/.test(value) // has a upercase letter
                    });
                    $.validator.addMethod("pwn", function(value) {
                        return /[0-9]/.test(value) // has a one number
                    });
                });
                </script>
@endsection
