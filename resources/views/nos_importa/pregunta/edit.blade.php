@extends('home')

@section('titulo')
Nos Importas (pregunta)
@endsection

@section('tituloForm')
Actualizar Pregunta
@endsection

@section('creacion')
@if ($errors->any())
    <ul class="bg-white text-danger p-2">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

@if (session('success'))
    <div>
        <p style="background: rgb(64, 129, 64); color: white;text-align: center">{{session('success')}}</p>
    </div>
@endif

@if (session('danger'))
    <div>
        <p style="background: rgb(243, 61, 37); color: white;text-align: center">{{session('danger')}}</p>
    </div>
@endif

<form action="{{url('/preguntas'.'/'.$datos->id)}}" class="row" method="post">
    @csrf
    @method('patch')
    <div class="col-md-6">
        <div class="mb-3">
            <label for="pregunta" class="form-label">Pregunta</label>
            <input type="text" class="form-control" id="pregunta" name="pregunta" @error("pregunta") style="border: 1px solid red" @enderror value="{{$datos->pregunta}}">
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="fecha_creacion" class="form-label">Fecha de creacion</label>
            <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" @error("fecha_creacion") style="border: 1px solid red" @enderror value="{{$datos->fecha_creacion}}">
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="intentos" class="form-label">Intentos</label>
            <input type="number" class="form-control" min="1" id="intentos" name="intentos" @error("intentos") style="border: 1px solid red" @enderror value="{{$datos->intentos}}">
        </div>
    </div>

    <div class="col-md-6">
        <label for="activo" class="form-label">Activo</label>
        <select class="form-select" name="activo" @error("activo") style="border: 1px solid red" @enderror>
            <option value="" selected disabled>Seleccione un estado</option>
            <option {{ $datos->activo == '1' ? 'selected' : '' }} value="1">Si</option>
            <option {{ $datos->activo == '0' ? 'selected' : '' }} value="0">No</option>
        </select>
    </div>

    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>
</form>
@endsection