@extends('plantilla')
@section('seccion')
<div class="d-flex justify-content-between align-items-center mt-2">
    <h1>Bienvenido Usuario</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active"><a href="{{ route('tablaC') }}">Clientes</a></li>
        </ol>
      </nav>
</div>
<div class="card">
    <div class="card-header bg-secondary">
      <i class="bi bi-search"></i> Listado de Clientes
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
                        <input type="search" name="search" id="buscar">
                    </form>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="table-light">
                    <th id="apellido">Nro</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Cedula</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                    <tr>
                        <td>{{$client->id}}</td>
                        <td>{{$client->nombre}}</td>
                        <td>{{$client->apellido}}</td>
                        <td>{{$client->direccion}}</td>
                        <td>{{$client->cedula}}</td>
                        <td>{{$client->telefono}}</td>
                        <td>{{$client->correo_electronico}}</td>
                        <td>
                            <div class="d-flex justify-content-start">
                                <button type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                                <form action="{{ route('client.destroy', $client) }}"  method="POST">
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
                {{$clients -> links('pagination::bootstrap-4')}}
            </div>
        </div>

    </div>
    <div class="card-footer ">
        <a type="button" class="btn btn-info" href="{{route('client.add')}}"><i class="bi bi-plus"></i> Nuevo Registro</a>
        <button type="button" class="btn btn-success"> <i class="bi bi-arrow-repeat"></i> Actualizar</button>
      </div>
  </div>
@endsection
