@extends('home')

@section('titulo')
Expediente
@endsection

@section('tituloForm')
Actualizar Expediente
@endsection

@section('creacion')
@if ($errors->any())
    <ul class="bg-white text-danger p-2">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="{{url('expedientes/'.$datos->id)}}" class="row" method="post">
    @csrf
    {{method_field('PATCH')}}
    <div class="row">
        <div class="col-md-4">
            <label for="id_user_soluciona" class="form-label">Usuario asignado</label>
            <select class="form-select" name="id_user_soluciona">
                <option disabled selected value="">Asignar expediente</option>
                @foreach ($programadores as $user)
                    @if ($datos->id_user_soluciona === $user->id)
                        <option selected value="{{ $user->id }}">{{ $user->name }}</option>
                    @else
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="prioridad" class="form-label">Prioridad</label>
            <select class="form-select" name="prioridad">
                <option disabled selected value="">Asignar prioridad</option>
                @foreach ($prioridades as $prioridad)
                    @if ($datos->prioridad === $prioridad)
                        <option selected value="{{$prioridad}}">{{$prioridad}}</option>
                    @else
                        <option  value="{{$prioridad}}">{{$prioridad}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="ultimoAcceso" class="form-label">Estado</label>
            <select class="form-select" name="estado">
                    <option value="" disabled selected>Seleccione estado</option>
                @foreach ($estados as $estado)
                    @if ($datos->estado == $estado)    
                        <option selected value="{{$estado}}">{{$estado}}</option>
                    @else
                        <option {{ old('estado') == $estado ? 'selected' : '' }} value="{{$estado}}">{{$estado}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="fecha_programada" class="form-label">Fecha programada</label>
            <input type="date" class="form-control" id="fecha_programada" name="fecha_programada" value="{{$datos->fecha_programada ? $datos->fecha_programada : ''}}">
        </div>
        
        <div class="col-md-4">
            <label for="id_empresa" class="form-label">Empresa</label>
            <select class="form-select" name="id_empresa">
                <option disabled selected value="">Asignar empresa</option>
                @foreach ($clientes as $cliente)
                    @if ($datos->id_empresa == $cliente->id)
                        <option selected value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                    @else
                        <option {{ old('id_empresa') == $cliente->id ? 'selected' : '' }} value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="id_software" class="form-label">Sistema</label>
            <select class="form-select" name="id_software">
                <option disabled selected value="">Asignar sistema</option>
                @foreach ($softwares as $software)
                    @if ($software->id == $datos->id_software)
                        <option selected value="{{$software->id}}">{{$software->software}}</option>
                    @else  
                        <option {{ old('id_software') == $software->id ? 'selected' : '' }} value="{{$software->id}}">{{$software->software}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>

    <a href="{{url('/expedientes')}}" class="boton regresar"><ion-icon name="arrow-back-outline"></ion-icon>Regresar</a>
</form>
@endsection
