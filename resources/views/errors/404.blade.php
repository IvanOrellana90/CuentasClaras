<head>
    <link rel="stylesheet" href="{{ URL::to('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/404.css') }}">
</head>
<body>
    <div class="container">
        <div class="nb-error">
            <div class="error-code"><strong>404</strong></div>
            <h3 class="font-bold">Estas perdido?</h3>

            <div>
                La página que estás buscando no existe o fue eliminada <br/>
                intenta regresar al inicio para continuar con tus cuentas.
                <div class="botones">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="{{ route('home') }}" class="btn btn-primary">Inicio</a>
                        </div>
                        <div class="col-lg-6">
                            <a href="{{ route('inicio') }}" class="btn btn-primary">Login</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-noidea" src="{{ URL::to('img/errors/noidea.jpg') }}">
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="text-center">
            <span>©</span>
            <span>2017</span>
            <span>-</span>
            <span>CuentasClaras.com</span>
        </div>
    </footer>
    <script src="{{ URL::to('https://code.jquery.com/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ URL::to('vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ URL::to('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>