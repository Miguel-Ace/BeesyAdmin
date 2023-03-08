@extends('home')

@section('titulo')
Usuarios
@endsection

@section('tituloForm')
Actualizar Usuario
@endsection

@section('creacion')
@if ($errors->any())
    <ul class="bg-white text-danger p-2">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="{{url('user_cliente/'.$datos->id.'/'.$datos->cliente)}}" class="row" method="post">
    @csrf
    {{method_field('PATCH')}}
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" @error("name") style="border: 1px solid red" @enderror value="{{$datos->name}}">
          </div>
      </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="email" class="form-label">Correo</label>
            <input type="email" class="form-control" id="email" name="email" @error("email") style="border: 1px solid red" @enderror value="{{$datos->email}}">
          </div>
      </div>

      <div class="col-md-4 d-none">
        <div class="mb-3">
            <label for="cliente" class="form-label">Cliente</label>
            <input type="number" class="form-control" id="cliente" name="cliente" @error("cliente") style="border: 1px solid red" @enderror value="{{ $datos->cliente }}">
          </div>
      </div>

    <button type="submit" class="boton enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>

    <a href="{{url('/user_cliente?buscar='.$datos->cliente)}}" class="boton regresar"><ion-icon name="arrow-back-outline"></ion-icon>Regresar</a>
</form>
@endsection
