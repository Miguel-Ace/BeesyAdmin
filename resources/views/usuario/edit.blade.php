@extends('home')

@section('titulo')
Usuarios
@endsection

@section('tituloForm')
Actualizar Usuario
@endsection

@section('creacion')
<form action="{{url('usuarios/'.$datos->id)}}" class="row" method="post">
    @csrf
    {{method_field('PATCH')}}
    <div class="col-md-4">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$datos->nombre}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="correo" class="form-label">Email</label>
            <input type="email" class="form-control" id="correo" name="correo" value="{{$datos->correo}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="text" class="form-control" id="contrasena" name="contrasena" value="{{$datos->contrasena}}">
          </div>
      </div>

    <button type="submit" class="boton enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>

    <button class="boton regresar">
      <ion-icon name="arrow-back-outline"></ion-icon>
      <a href="{{url('/usuarios')}}">Regresar</a>
    </button>
</form>
@endsection
