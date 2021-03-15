@extends('plantilla')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('seccion')
<div class="d-flex justify-content-between align-items-center mt-2">
    <h1>Bienvenido Usuario</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Ventas</li>
        </ol>
      </nav>
</div>
<div class="card">
    <div class="card-header bg-secondary">
      <i class="bi bi-search"></i> Listado de Ventas
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
                    <label for="search">Buscar: </label>
                    <input type="text" name="search" id="buscar">
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="table-light">
                    <th id="">Nro</th>
                    <th id="">Factura</th>
                    <th id="">Cliente</th>
                    <th>Fecha de registro</th>
                    <th>Subtotal</th>
                    <th>IVA</th>
                    <th>Total a pagar</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    <td>Eve</td>
                    <td>Jackson</td>
                    <td>
                      <button type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                      <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                      <button type="button" class="btn btn-success btn-sm"><i class="bi bi-search"></i></button>
                      <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-file-earmark-text-fill"></i></button>
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
        <a href="{{route('sale.add')}}" type="button" class="btn btn-info"><i class="bi bi-plus"></i> Nuevo Registro</a>
        <button type="button" class="btn btn-success"> <i class="bi bi-arrow-repeat"></i> Actualizar</button>
      </div>
  </div>
@endsection
