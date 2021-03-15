@extends('plantilla')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!--Tables-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection

@section('seccion')
<div class="d-flex justify-content-between align-items-center mt-2">
    <h1>Bienvenido Usuario</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active"><a href="{{ route('tablaV') }}">Ventas</a></li>
        </ol>
      </nav>
</div>
<div class="card">
    <div class="card-header bg-secondary">
      <i class="bi bi-search"></i> Listado de Ventas
    </div>
    <div class="card-body">
            <table id="items-table" class="table">
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
                    @foreach ($sales as $sale)
                        <tr>
                            <td>boton +</td>
                            <td>{{$sale->id}}</td>
                            <td>{{$sale->nombre}} {{$sale->apellido}}</td>
                            <td>{{$sale->fecha}}</td>
                            <td>{{$sale->total}}/1.12</td>
                            <td>({{$sale->total}}-({{$sale->total}}/1.12))</td>
                            <td>{{$sale->total}}</td>
                            <td>
                                <div class="d-flex justify-content-start">
                                    <button type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                                    <form class="items-delete" action="{{ route('sale.destroy', $sale->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                    <button type="button" class="btn btn-success btn-sm"><i class="bi bi-search"></i></button>
                                    <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-file-earmark-text-fill"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
              </table>
    </div>
    <div class="card-footer ">
        <a href="{{route('sale.add')}}" type="button" class="btn btn-info"><i class="bi bi-plus"></i> Nuevo Registro</a>
        <button type="button" class="btn btn-success"> <i class="bi bi-arrow-repeat"></i> Actualizar</button>
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
