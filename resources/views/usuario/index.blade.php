@extends('home')

@section('titulo')
Usuarios
@endsection

@section('tituloForm')
Agregar Usuario
@endsection

@section('creacion')
@if ($errors->any())
    <ul class="bg-white text-danger p-2">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form action="{{url('/usuarios')}}" class="row" method="post">
    @csrf
    <div class="col-md-4">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" value="{{old('correo')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="text" class="form-control" id="contrasena" name="contrasena" value="{{ $random }}">
          </div>
      </div>

    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>
</form>
@endsection

@section('tituloTabla')
Lista de usuarios
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($datos as $dato )
                <tr>
                    <td>{{$dato->id}}</td>
                    <td>{{$dato->nombre}}</td>
                    <td>{{$dato->correo}}</td>
                    <td>{{$dato->contrasena}}</td>
                    <td>
                        <a href="{{url('usuarios/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        |
                        <form action="{{url('usuarios/'.$dato->id)}}" method="POST" class="delete">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit"><ion-icon name="beaker-outline"></ion-icon></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
