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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>                    
                @endforeach
            </ul>
        </div>        
    @endif
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
                    <label for="imageuser" class="form-label d-flex justify-content-start">Imagen: {{$user->image}}
                        <div class="form-check ms-4">
                            <label class="form-check-label" for="flexCheckDefault">Limpiar</label>
                            <input class="form-check-input" name="limpiar" type="checkbox" value="limpiar" id="flexCheckDefault">
                        </div>
                    </label>
                    <input type="file" class="form-control" name="image" id="imageuser">
                </div>
                <!-- Roles -->
                <div class="mb-3">
                    Grupos
                    <select name="rol" class="form-select" id="form-roles" required>
                    @foreach ($roles as $rol)
                        @if($rol_actual[0]->id == $rol->id)
                            <option selected value="{{$rol->id}}">{{$rol->name}}</option>
                        @else                            
                            <option value="{{$rol->id}}">{{$rol->name}}</option>
                        @endif
                    @endforeach
                    </select> 
                </div>
                <div class="mb-3">
                    <label for="passwordcategory" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" name="password" id="passwordcategory" placeholder="Ingrese contraseña" value="{{$user->password}}" required>
                </div>
            </div>
            <div class="card-footer ">
                <button type="submit" class="btn btn-info fw-bold"><i class="bi bi-plus"></i> Guardar registro</button>
                <a href="{{route('tablaU')}}" type="button" class="btn btn-success fw-bold"> <i class="bi bi-arrow-repeat"></i>Cancelar</a>
              </div>
        </form>

  </div>
@endsection

<!--script>
    window.onload=function(){
        let check_password = document.getElementById("flexCheckChange");
        let input_password = document.getElementById("passworduser");

        check_password.addEventListener("change", () => {
            console.log("press")
            if(input_password.disabled== true)
                input_password.disabled = false
            else
                input_password.disabled = true
        });
    }
</script>
