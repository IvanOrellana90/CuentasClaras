<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CuentasClaras</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        @include('layouts.includes.css')
        <!-- Favicon-->
        <link rel="shortcut icon" href="favicon.png">
    </head>
    <body>
    <div class="page login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <div class="row">
                    <!-- Logo & Information Panel-->
                    <div class="col-lg-6">
                        <div class="info d-flex align-items-center">
                            <div class="content">
                                <div class="logo">
                                    <h1>Cuentas Claras</h1>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Form Panel    -->
                    <div class="col-lg-6 bg-white">
                        <div class="form d-flex align-items-center">
                            <!-- Form Sign In -->
                            <div class="content" id="formLogin">
                                <form id="login-form" method="get" action="{{ route('login') }}">
                                    <div class="form-group">
                                        <input id="email" type="email" name="email" required="" class="input-material">
                                        <label for="email" class="label-material">Email</label>
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password" name="password" required="" class="input-material">
                                        <label for="password" class="label-material">Contraseña</label>
                                    </div>
                                    <button id="login" type="submit" class="btn btn-primary">Ingresar</button>
                                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                                </form>
                                <a href="#" class="forgot-pass">Olvidaste tu contraseña?</a><br><small>No tienes cuenta? </small><a href="" id="linkLogin" class="signup">Registrate</a>
                            </div>
                            <!-- Form Register -->
                                <div class="content" id="formRegister" style="display: none">
                                <form id="register-form" method="post" action="{{ route('user.store') }}">
                                    <div class="form-group">
                                        <input id="name" type="text" name="name" required="" class="input-material">
                                        <label for="name" class="label-material">Nombre</label>
                                    </div>
                                    <div class="form-group">
                                        <input id="lastName" type="text" name="lastName" required="" class="input-material">
                                        <label for="lastName" class="label-material">Apellido</label>
                                    </div>
                                    <div class="form-group">
                                        <input id="email" type="email" name="email" required="" class="input-material">
                                        <label for="email" class="label-material">Email</label>
                                    </div>
                                    <div class="form-group">
                                        <input id="passowrd" type="password" name="password" required="" class="input-material">
                                        <label for="passowrd" class="label-material">Contraseña</label>
                                    </div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input id="register" type="submit" value="Registrarse" class="btn btn-primary">
                                </form>
                                <small>Ya tienes una cuenta? </small><a href="" id ="linkRegister" class="signup">Ingresar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights text-center">
            <p>Desarrollado por <a href="#" class="external">EnZo</a></p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </div>
    </div>
    <!-- Javascript files-->
    @include('layouts.includes.js')
    <script src="{{ URL::to('js/login.js') }}"></script>
    </body>
</html>