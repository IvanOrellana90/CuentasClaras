<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CuentasClaras | Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="{{ URL::to('assets-login/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets-login/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets-login/css/form-elements.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets-login/css/style.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="">

</head>

<body>

<!-- Modal de registro -->
<div class="modal fade" id="modalRegistrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" action="{{ route('user.store') }}" method="post" class="login-form">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Nuevo usuario</h2>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="sr-only" for="form-name">Nombre</label>
                        <input type="text" name="form-name" placeholder="Nombre" class=" form-username form-control" id="form-name">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-lastName">Apellido</label>
                        <input type="text" name="form-lastName" placeholder="Apellido" class=" form-username form-control" id="form-lastName">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-email">Username</label>
                        <input type="text" name="form-email" placeholder="Correo" class=" form-username form-control" id="form-email">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-password">Password</label>
                        <input type="password" name="form-password" placeholder="Contraseña" class="form-password form-control" id="form-password">
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-ingresar">Ingresar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1>Cuentas<strong>Claras</strong></h1>
                    <div class="description">
                        <p>
                            This is a free responsive login form made with Bootstrap.
                            Download it on <a href="http://azmind.com"><strong>AZMIND</strong></a>, customize and use it as you like!
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Ingresa a nuestro sitio</h3>
                            <p>¿No tienes cuenta? <a data-toggle="modal" data-target="#modalRegistrar" style="cursor:pointer">Registrate</a></p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" action="{{ route('validateLogin') }}" method="post" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="email">Email</label>
                                <input type="text" name="email" placeholder="Correo" class="form-username form-control" id="emails">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">Password</label>
                                <input type="password" name="password" placeholder="Contraseña" class="form-password form-control" id="password">
                            </div>
                            <button type="submit" class="btn">Ingresar</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if(count($errors) > 0)
                                <div class="errors">
                                    @foreach($errors->all() as $error)
                                        <p class="p-errors">{{$error}}</p>
                                    @endforeach
                                </div>
                            @endif
                            @if(Session::has('message'))
                                <div class="errors">
                                    <p class="p-errors">{{Session::get('message')}}</p>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 social-login">
                    <h3>...o puedes ingresar con:</h3>
                    <div class="social-login-buttons">
                        <a class="btn btn-link-2" href="#">
                            <i class="fa fa-facebook"></i> Facebook
                        </a>
                        <a class="btn btn-link-2" href="#">
                            <i class="fa fa-twitter"></i> Twitter
                        </a>
                        <a class="btn btn-link-2" href="{{ route('googleLogin') }}">
                            <i class="fa fa-google-plus"></i> Google Plus
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Javascript -->
<script src="{{ URL::to('assets-login/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ URL::to('assets-login/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::to('assets-login/js/jquery.backstretch.min.js') }}"></script>
<script src="{{ URL::to('assets-login/js/scripts.js') }}"></script>

<!--[if lt IE 10]>
<script src="{{ URL::to('vendor/js/placeholder.js') }}"></script>
<![endif]-->

</body>

</html>