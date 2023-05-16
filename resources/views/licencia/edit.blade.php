@extends('home')

@section('titulo')
Licencias
@endsection

@section('tituloForm')
Actualizar Licencias
@endsection

@section('creacion')
<form action="{{url('licencias/'.$datos->id)}}" class="row" method="post">
    @csrf
    {{method_field('PATCH')}}
    <div class="row">
        <div class="col-md-4">
            <label for="id_cliente" class="form-label">Cliente</label>
            <select class="form-select" name="id_cliente">
                @foreach ($clientes as $cliente)
                    @if ($cliente->nombre === $datos->id_cliente)
                        <option value="{{$cliente->nombre}}" selected>{{$cliente->nombre}}</option>
                    @else
                        <option value="{{$cliente->nombre}}">{{$cliente->nombre}}</option>
                    @endif
                @endforeach
            </select>
          </div>
        <div class="col-md-4">
            <label for="id_software" class="form-label">Software</label>
            <select class="form-select" name="id_software">
                @foreach ($softwares as $software)
                    @if ($software->software === $datos->id_software)
                        <option value="{{$software->software}}" selected>{{$software->software}}</option>
                    @else
                        <option value="{{$software->software}}">{{$software->software}}</option>
                    @endif

                @endforeach
            </select>
          </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" min="1" class="form-control" id="cantidad" name="cantidad" value="{{$datos->cantidad}}">
              </div>
          </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
                <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" value="{{$datos->fechaInicio}}">
              </div>
          </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="fechaFinal" class="form-label">Fecha Final</label>
                <input type="date" class="form-control" id="fechaFinal" name="fechaFinal" value="{{$datos->fechaFinal}}">
              </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
                <label for="ruta" class="form-label">Ruta</label>
                <input type="text" class="form-control" id="ruta" name="ruta" value="{{$datos->ruta}}">
              </div>
          </div>
        </div>

    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>

    <a href="{{url('/licencias')}}" class="boton regresar"><ion-icon name="arrow-back-outline"></ion-icon>Regresar</a>
</form>
@endsection
