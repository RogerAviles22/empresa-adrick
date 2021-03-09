@extends('plantilla')
@section('seccion')
<div class="d-flex justify-content-between align-items-center mt-2">
    <h1>Bienvenido Usuario</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Library</li>
        </ol>
      </nav>
</div>
<div class="card">
    <div class="card-header">
      <i class="bi bi-search"></i>Listado de Categorias
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-light">
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    <td>Jill</td>
                    <td>Smith</td>
                    <td><i class="bi bi-pencil-square"></i><i class="bi bi-trash-fill"></i></td>
                </tbody>
                <tbody>
                    <td>Eve</td>
                    <td>Jackson</td>
                    <td>
                      <button type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                      <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                    </td>
                </tbody>
              </table>
        </div>
        <div class="d-flex justify-content-between">
            <p>Mostrando 1 de algunas</p>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
              </nav>
        </div>
        
    </div>
    <div class="card-footer ">
        <button type="button" class="btn btn-info"><i class="bi bi-plus"></i> Nuevo Registro</button>
        <button type="button" class="btn btn-success"> <i class="bi bi-arrow-repeat"></i> Actualizar</button>
      </div>
  </div>
@endsection
