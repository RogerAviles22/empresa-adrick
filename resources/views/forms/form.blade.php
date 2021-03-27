@extends('plantilla')
@section('seccion')
<div class="d-flex justify-content-between align-items-center mt-2">
    <h1>Bienvenido {{auth()->user()->name}} {{auth()->user()->apellido}}</h1>
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
        <form action="{{route('category.create')}}" method="post">
            @csrf
            <div class="row">
                <div class="mb-3">
                    <label for="nombrecategory" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombrecategory" placeholder="Ingrese un nombre" required>
                  </div>
            </div>
            <div class="card-footer ">
                <button type="submit" class="btn btn-info fw-bold"><i class="bi bi-plus"></i> Guardar registro</button>
                <a href="{{redirect()->getUrlGenerator()->previous()}}" type="button" class="btn btn-success fw-bold"> <i class="bi bi-arrow-repeat"></i>Cancelar</a>
              </div>
        </form>

  </div>
@endsection
