@extends('plantilla')
@section('seccion')
<div class="d-flex justify-content-between align-items-center mt-2">
    <h1>Bienvenido Usuario</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item" aria-current="page"><a href="{{ route('tabla') }}">Categorías</a></li>
        </ol>
      </nav>
</div>
<div class="card">
    <div class="card-header bg-secondary">
      <i class="bi bi-plus"></i> Creación de una categoría
    </div>
    <div class="card-body">
        <form action="">
            @csrf
            <div class="row">
                <div class="mb-3">
                    <label for="nombrecategory" class="form-label">Email address</label>
                    <input type="text" class="form-control" name="nombre" id="nombrecategory" placeholder="Ingrese un nombre">
                  </div>
            </div>
            <div class="card-footer ">
                <button type="button" class="btn btn-info fw-bold"><i class="bi bi-plus"></i> Guardar registro</button>
                <button type="button" class="btn btn-success fw-bold"> <i class="bi bi-arrow-repeat"></i>Cancelar</button>
              </div>
        </form>
        
  </div>
@endsection
