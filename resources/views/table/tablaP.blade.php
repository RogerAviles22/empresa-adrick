@extends('plantilla')

@section('css')
    <!--Tables-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection

@section('seccion')
<div class="d-flex justify-content-between align-items-center mt-2">
    <h1>Bienvenido {{auth()->user()->name}} {{auth()->user()->apellido}}</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active"><a href="{{ route('tablaP') }}">Productos</a></li>
        </ol>
      </nav>
</div>
<div class="card">
    <div class="card-header bg-secondary">
      <i class="bi bi-search"></i> Listado de Productos
    </div>
    <div class="card-body">
    <table id="items-table" class="table table-striped">
        <thead class="table-light">
            <th id="">Nro</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Categoría</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->nom_producto}}</td>
                <td>{{$product->precio}}</td>
                <td><span class="badge bg-success">{{$product->stock}}</span></td>
                <td>{{$product->nombre}}</td>
                <td>
                    <div class="d-flex justify-content-start">
                        <a href="{{route('product.edit',$product->id)}}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <form class="items-delete" action="{{ route('product.destroy', $product->id) }}"  method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="card-footer ">
        <a type="button" class="btn btn-info" href="{{route('product.add')}}"><i class="bi bi-plus"></i> Nuevo Registro</a>
        <a type="button" class="btn btn-success" href="{{route('tablaP')}}"><i class="bi bi-arrow-repeat"></i> Actualizar</a>
      </div>
  </div>
@endsection

@section('js')
    <!--Tables-->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('js/tables.js') }}"></script>

    <!--Alerts-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '!Borrado!',
                'El elemento fue borrado exitosamente',
                'success'
            );
        </script>
    @endif
    <script src="{{ asset('js/alerts.js') }}"></script>
@endsection
