@extends('plantilla')
@section('seccion')
<div class="d-flex justify-content-between align-items-center mt-2">
    <h1>Bienvenido Usuario</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item" aria-current="page"><a href="{{ route('tabla') }}">Cliente</a></li>
        </ol>
      </nav>
</div>
<div class="card">
    <div class="card-header bg-secondary">
      <i class="bi bi-plus"></i> Creación de un Cliente
    </div>
    <div class="card-body">
        <form action="{{route('client.create')}}" method="post">
            @csrf
            <div class="row">
                <div class="mb-3">
                    <label for="nombrecategory" class="form-label">Nombres</label>
                    <input type="text" class="form-control" name="nombre" id="nombrecategory" placeholder="Ingrese los nombres">
                  </div>
                  <div class="mb-3">
                    <label for="nombrecategory" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="apellido" id="nombrecategory" placeholder="Ingrese los apellidos">
                  </div>
                  <div class="mb-3">
                    <label for="nombrecategory" class="form-label">Direccion</label>
                    <input type="text" class="form-control" name="direccion" id="nombrecategory" placeholder="Ingrese una direccion">
                  </div>
                  <div class="mb-3">
                    <label for="nombrecategory" class="form-label">Cedula</label>
                    <input type="text" class="form-control" name="cedula" id="nombrecategory" placeholder="Ingrese una identificacion">
                  </div>
                  <div class="mb-3">
                    <label for="nombrecategory" class="form-label">Telefono</label>
                    <input type="text" class="form-control" name="telefono" id="nombrecategory" placeholder="Ingrese un telefono">
                  </div>
                  <div class="mb-3">
                    <label for="nombrecategory" class="form-label">Correo Electronico</label>
                    <input type="text" class="form-control" name="correo" id="nombrecategory" placeholder="Ingrese un corre">
                  </div>

            </div>
            <div class="card-footer ">
                <button type="submit" class="btn btn-info fw-bold"><i class="bi bi-plus"></i> Guardar registro</button>
                <button type="button" class="btn btn-success fw-bold"> <i class="bi bi-arrow-repeat"></i>Cancelar</button>
              </div>
        </form>

  </div>
@endsection
