@extends('plantilla')
@section('seccion')
<div class="d-flex justify-content-between align-items-center mt-2">
    <h1>Bienvenido Usuario</h1>
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
        <div class="row extras">
            <div class="col-xl-6">
                <div class="tam">
                    <label for="tamano">Mostrar</label>
                    <select name="tamano" id="numreg">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                    <label for=""> registros</label>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="buscador">
                    <form>
                        <label for="search">Buscar: </label>
                        <input type="text" name="search" id="buscar">
                    </form>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="table-light">
                    <th id="">Nro</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->nom_producto}}</td>
                        <td>{{$product->precio}}</td>
                        <td><span class="badge bg-success">{{$product->stock}}</span></td>
                        <td>{{$product->id_categoria}}</td>
                        <td>
                            <div class="d-flex justify-content-start">
                                <button type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                                <form class="items-delete" action="{{ route('product.destroy', $product) }}"  method="POST">
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
        <div class="d-flex justify-content-between">
            <p>Mostrando 1 de algunas</p>
            <div class="pagination justify-content-center">
                {{$products -> links('pagination::bootstrap-4')}}
            </div>
        </div>

    </div>
    <div class="card-footer ">
        <a type="button" class="btn btn-info" href="{{route('product.add')}}"><i class="bi bi-plus"></i> Nuevo Registro</a>
        <button type="button" class="btn btn-success"> <i class="bi bi-arrow-repeat"></i> Actualizar</button>
      </div>
  </div>
@endsection

<!--Alerts-->
@section('js')
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