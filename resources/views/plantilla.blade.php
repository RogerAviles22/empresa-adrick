<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Empresa Adricks´Jr</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href=" {{ asset('css/normalize.css')}}" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">        
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}" />        
    </head>
    <body >
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="bi bi-list"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown pr-5">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-gear-fill"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <span class="dropdown-header" style="font-size: 12px;">Ultima vez conectado</span>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square mr-2"></i> Editar perfil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square mr-2"></i>Editar password</a></li>                            
                        </ul>
                    </li>
                    <li class="nav-item px-5">
                        <a class="nav-link" href="">
                            <i class="bi bi-power" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Aqupi se cargan las secciones Estadisticas, Categorias, Productos, Ventas, Clientes y Usuarios-->
        <section class="container-fluid main">
            @yield('seccion')
        </section>

        <footer class="main-footer text-center">
            <strong>Copyright &copy; 2020-2021 <a href="https://adminlte.io"></a>.Adrick' JR</strong><br>
            Todos los derechos reservados.
        </footer>      

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script> 
    </body>
</html>