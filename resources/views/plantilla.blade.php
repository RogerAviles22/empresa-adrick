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
        @yield('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/simple-sidebar.css')}}" />
        <link rel="icon" type="image/png" href="{{ asset('img/cart.png') }}" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="border-right " id="sidebar-wrapper">
              <div class="sidebar-heading "><a id="adrick" href="{{ route('dashboard') }}"><i id="carrito" class="bi bi-cart"></i>Adrick' JR</a></div>
              <hr>
              <div id="user" class="user">USUARIO</div>
              <hr>
              <p id="mant" class="my-3 ps-2">Mantenimiento</p>
              <div class="list-group list-group-flush">
                <a href="{{route('tabla')}}" class="list-group-item list-group-item-action my-1"><i class="bi bi-inboxes-fill"></i> Categorías</a>
                <a href="{{route('tablaP')}}" class="list-group-item list-group-item-action my-1"><i class="bi bi-box-seam"></i> Productos</a>
                <a href="{{route('tablaC')}}" class="list-group-item list-group-item-action my-1"><i class="bi bi-people-fill"></i> Clientes</a>
                <a href="{{route('tablaV')}}" class="list-group-item list-group-item-action my-1"><i class="bi bi-cart"></i> Ventas</a>
                <a href="{{route('tablaU')}}" class="list-group-item list-group-item-action my-1"><i class="bi bi-person-fill"></i> Usuarios</a>
              </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                    <div class="container-fluid">
                        <ul class="navbar-nav ">
                            <li class="nav-item">
                                <button class="btn btn-dark" id="menu-toggle"><i class="bi bi-list"></i></button>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Home</a>
                            </li>
                        </ul>

                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown pr-5">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-gear-fill"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <span class="dropdown-header" style="font-size: 12px;">Ultima vez conectado</span>
                                    <li><a class="dropdown-item"  href="{{ route('user.edit', auth()->id()) }}"><i class="bi bi-pencil-square mr-2"></i> Editar perfil</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square mr-2"></i>Editar password</a></li>
                                </ul>
                            </li>
                            <li class="nav-item ">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                        <a class="nav-link" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            <i class="bi bi-power" aria-hidden="true"></i>
                                        </a>
                                    </form>
                            </li>
                        </ul>
                    </div>
                </nav>

              <!-- Aquí se cargan las secciones Estadisticas, Categorias, Productos, Ventas, Clientes y Usuarios-->
                <section class="container-fluid main">
                    @yield('seccion')
                </section>

                <footer class="main-footer text-center">
                    <strong>Copyright &copy; 2020-2021 <a href="https://adminlte.io"></a>.Adrick' JR</strong><br>
                    Todos los derechos reservados.
                </footer>
            </div>
            <!-- /#page-content-wrapper -->

          </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        @yield('js')
        <script>
            jQuery(document).ready(function($){
                $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
                });
            });
        </script>
    </body>
</html>
