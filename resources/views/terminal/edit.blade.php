@extends('home')

@section('titulo')
Terminales
@endsection

@section('tituloForm')
Actualizar Terminal
@endsection

@section('creacion')
<form action="{{url('terminales/'.$datos->id)}}" class="row" method="post">
    @csrf
    {{method_field('PATCH')}}
    <div class="row">
        <div class="col-md-4">
            <label for="id_licencia" class="form-label">Licencia</label>
            <select class="form-select" name="id_licencia">
                @foreach ($clientes as $cliente)
                    @if ($cliente->id === $datos->clientes->id)
                        <option value="{{$cliente->id}}" selected>{{$cliente->nombre}}</option>
                    @else
                        <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                    @endif
                @endforeach
            </select>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
                <label for="serial" class="form-label">Serial</label>
                <input type="number" min="0" class="form-control" id="serial" name="serial" value="{{$datos->serial}}">
              </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
                <label for="nombreEquipo" class="form-label">Nombre Equipo</label>
                <input type="text" min="0" class="form-control" id="nombreEquipo" name="nombreEquipo" value="{{$datos->nombreEquipo}}">
              </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
                <label for="ultimoAcceso" class="form-label">Último Acceso</label>
                <input type="date" min="0" class="form-control" id="ultimoAcceso" name="ultimoAcceso" value="{{$datos->ultimoAcceso}}">
              </div>
          </div>
          <div class="col-md-4">
            <label for="ultimoAcceso" class="form-label">Estado</label>
            <select class="form-select" name="estado">
                @if ($datos->estado === 'activo')
                    <option value="activo" selected>Activo</option>
                    <option value="inactivo">Inactivo</option>
                @else
                    <option value="activo">Activo</option>
                    <option value="inactivo" selected>Inactivo</option>
                @endif
            </select>
          </div>
    </div>
    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>

    <a href="{{url('/terminales')}}" class="boton regresar"><ion-icon name="arrow-back-outline"></ion-icon>Regresar</a>
</form>
@endsection
