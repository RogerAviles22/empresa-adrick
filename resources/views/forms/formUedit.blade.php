@extends('plantilla')
@section('seccion')
<div class="d-flex justify-content-between align-items-center mt-2">
    <h1>Bienvenido Usuario</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('tablaU') }}">Usuarios</a></li>
        </ol>
      </nav>
</div>
<div class="card">
    <div class="card-header bg-secondary">
      <i class="bi bi-plus"></i> Edición de un Cliente
    </div>
    <div class="card-body">
        <form action="{{ route('user.update', [ $user->id ]) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="row">
                <div class="mb-3">
                    <label for="nombreuser" class="form-label">Nombre:</label>
                    <input type="text" id="nombreuser" class="form-control" value="{{$user->name}}" name="name" placeholder="Ingrese los nombres" required>
                </div>
                <div id="label-cat" class="mb-1">
                    <label for="apellidouser" class="form-label">Apellido:</label>
                    <input type="text" id="apellidouser" class="form-control" value="{{$user->apellido}}" name="apellido" placeholder="Ingrese el apellido" required>
                </div>
                <div class="mb-3">
                    <label for="emailcategory" class="form-label">Dirección de correo electrónico:</label>
                    <input type="email" step=".01" class="form-control" name="email" id="emailcategory" placeholder="Ingrese el correo" value="{{$user->email}}" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de usuario:</label>
                    <input type="text" class="form-control" name="nom_usuario" id="username" placeholder="Ingrese contraseña" value="{{$user->nom_usuario}}" required>
                </div>
                <div class="mb-3">
                    <label for="passwordcategory" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" name="password" id="passwordcategory" placeholder="Ingrese contraseña" value="{{$user->password}}" required>
                </div>
                <div class="mb-3">
                    <label for="imageuser" class="form-label">Imagen: {{$user->image}}</label>
                    <input type="file" class="form-control" name="image" id="imageuser">
                </div>
            </div>
            <div class="card-footer ">
                <button type="submit" class="btn btn-info fw-bold"><i class="bi bi-plus"></i> Guardar registro</button>
                <a href="{{route('tablaU')}}" type="button" class="btn btn-success fw-bold"> <i class="bi bi-arrow-repeat"></i>Cancelar</a>
              </div>
        </form>

  </div>
@endsection
