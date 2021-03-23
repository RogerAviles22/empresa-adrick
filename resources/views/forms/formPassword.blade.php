@extends('plantilla')
@section('seccion')
<div class="d-flex justify-content-between align-items-center mt-2">
    <h1>Bienvenido {{auth()->user()->name}} {{auth()->user()->apellido}}</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        </ol>
      </nav>
</div>
<div class="card">
    <div class="card-header bg-secondary">
      <i class="bi bi-plus"></i> Cambiar contraseña
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>                    
                @endforeach
            </ul>
        </div>        
    @endif
    @if (session('exito'))
        <div class="alert alert-success">
            {{session('exito')}}
        </div>
      @endif
    <div class="card-body">
        <form action="{{ route('password.change') }}" method="post">
            @method('put')
            @csrf
            <div class="row">
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña Nueva:</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Ingrese contraseña nueva" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar Contraseña:</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirme contraseña" required>
                </div>
            </div>
            <div class="card-footer ">
                <button type="submit" class="btn btn-info fw-bold"><i class="bi bi-plus"></i> Guardar registro</button>
                <a href="{{route('dashboard')}}" type="button" class="btn btn-success fw-bold"> <i class="bi bi-arrow-repeat"></i> Cancelar</a>
              </div>
        </form>

  </div>
@endsection
