@extends('home')

@section('titulo')
Nos Importas (pregunta)
@endsection

@section('tituloForm')
Agregar Pregunta
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

<form action="{{url('/preguntas')}}" class="row" method="post">
    @csrf
    <div class="col-md-6">
        <div class="mb-3">
            <label for="pregunta" class="form-label">Pregunta</label>
            <input type="text" class="form-control" id="pregunta" name="pregunta" @error("pregunta") style="border: 1px solid red" @enderror value="{{old('pregunta')}}">
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="fecha_creacion" class="form-label">Fecha de creacion</label>
            <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" @error("fecha_creacion") style="border: 1px solid red" @enderror value="{{old('fecha_creacion')}}">
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="intentos" class="form-label">Intentos</label>
            <input type="number" class="form-control" min="1" id="intentos" name="intentos" @error("intentos") style="border: 1px solid red" @enderror value="{{old('intentos')}}">
        </div>
    </div>

    <div class="col-md-6">
        <label for="activo" class="form-label">Activo</label>
        <select class="form-select" name="activo" @error("activo") style="border: 1px solid red" @enderror>
            <option value="" selected disabled>Seleccione un estado</option>
            <option {{ old('activo') == '1' ? 'selected' : '' }} value="1">Si</option>
            <option {{ old('activo') == '0' ? 'selected' : '' }} value="0">No</option>
        </select>
    </div>

    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>
</form>
@endsection

@section('tituloTabla')
Lista de pregunta
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Pregunta</th>
                <th scope="col">Fecha de creacion</th>
                <th scope="col">Intentos</th>
                <th scope="col">Activo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($datos as $dato )
                <tr>
                    <td>{{$dato->id}}</td>
                    <td>{{$dato->pregunta}}</td>
                    <td>{{$dato->fecha_creacion}}</td>
                    <td>{{$dato->intentos}}</td>
                    <td>{{$dato->activo}}</td>
                    <td>
                        <a href="{{url('preguntas/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        |
                        <form action="{{url('preguntas/'.$dato->id)}}" method="POST" class="delete">
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