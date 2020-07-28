<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Unidades Federativas</title>
    <!-- Importação configuração css global -->
    <link href="{{ asset('site/global.css') }}" rel="stylesheet">
    <!-- Importação do Bootstrap  -->
    <link href="{{ asset('site/bootstrap.css') }}" rel="stylesheet">

</head>

<body>
    <div class="jumbotron text-center jumbotron-fluid">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('site.uf') }}">UNIDADES FEDERATIVAS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('site.municipio') }}">MUNICÍPIOS</a>
            </li>
        </ul>
    </div>
    <div class="content container">
        @yield('content')
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small text-white">
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://claretiano.edu.br/"> Claretiano</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <!-- Jquery -->
    <script src="{{ asset('site/jquery.js') }}"></script>
    <!-- Jquery Slim para Modal do Bootstrap -->
    <script src="{{ asset('site/jquery-slim.js') }}" rel="text/javascript"></script>
    <!-- Importação Bootstrap JS-->
    <script src="{{ asset('site/bootstrap.js') }}" rel="text/javascript"></script>
    <!-- Importação Fontawesome -->
    <script src="{{ asset('site/fontawesome.js') }}" rel="text/javascript"></script>
    <!-- Validação -->
    <script src="{{ asset('site/validation.js') }}" rel="text/javascript"></script>

</body>

</html>
