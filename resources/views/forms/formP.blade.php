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
      <i class="bi bi-plus"></i> Creación de un Producto
    </div>
    <div class="card-body">
        <form action="{{route('product.create')}}" method="post">
            @csrf
            <div class="row">
                <div class="mb-3">
                    <label for="nombrecategory" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombrecategory" placeholder="Ingrese los nombres" required>
                  </div>
                  <div id="label-cat" class="mb-1">
                    <label for="nombrecategory" class="form-label">Categoría</label>
                  </div>
                  <div class="mb-3">
                    <select id="select-cat" name="categoria" id="cat" required>

                        @foreach($cats as $cat)
                        <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                        @endforeach

                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="nombrecategory" class="form-label">Precio</label>
                    <input type="number" step=".01" class="form-control" name="precio" id="nombrecategory" placeholder="Ingrese el precio" required>
                  </div>
                  <div class="mb-3">
                    <label for="nombrecategory" class="form-label">Stock</label>
                    <input type="number" class="form-control" name="stock" id="nombrecategory" placeholder="Ingrese cantidad disponible" required>
                  </div>


            </div>
            <div class="card-footer ">
                <button type="submit" class="btn btn-info fw-bold"><i class="bi bi-plus"></i> Guardar registro</button>
                <a href="{{redirect()->getUrlGenerator()->previous()}}" type="button" class="btn btn-success fw-bold"> <i class="bi bi-arrow-repeat"></i>Cancelar</a>
              </div>
        </form>

  </div>
@endsection
