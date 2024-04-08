@extends('home')

@section('titulo')
soporte
@endsection

@section('tituloForm')
Actualizar soporte
@endsection

@section('creacion')
@if ($errors->any())
    <ul class="bg-white text-danger p-2">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form action="{{url('soporte/'.$datos->id)}}" class="row" method="post">
    @csrf
    {{method_field('PATCH')}}

    <div class="col-md-3 d-none">
      <div class="mb-3">
          <label for="ticker" class="form-label">Ticket (Auto Generado)</label>
          <input type="number" class="form-control" id="ticker" name="ticker"  value="{{$datos->ticker}}">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <label for="colaborador">Colaborador</label>
              <select class="form-select" name="colaborador">
                @foreach ($usuarios as $user)
                  @if ($datos->colaborador === $user->name)
                    <option value="{{$user->name}}" selected>{{$user->name}}</option>
                  @else
                    <option value="{{$user->name}}">{{$user->name}}</option>
                  @endif
                @endforeach
              </select>
          </div>

          <div class="col-md-4">
            <div class="mb-3">
                <label for="fechaInicioAsistencia" class="form-label">Fecha y hora inicio de asistencia</label>
                <input type="datetime-local" class="form-control" id="fechaInicioAsistencia" name="fechaInicioAsistencia" value="{{$datos->fechaInicioAsistencia ? $datos->fechaInicioAsistencia : old('fechaInicioAsistencia')}}" @error("fechaInicioAsistencia")style="border: solid 2px red"@enderror>
              </div>
          </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="fechaFinalAsistencia" class="form-label">Fecha y hora final de asistencia</label>
                <input type="datetime-local" class="form-control" id="fechaFinalAsistencia" name="fechaFinalAsistencia" value="{{$datos->fechaFinalAsistencia ? $datos->fechaFinalAsistencia : old('fechaFinalAsistencia')}}" @error("fechaFinalAsistencia")style="border: solid 2px red"@enderror>
              </div>
          </div>

        <div class="col-md-4 d-none">
            <div class="mb-3">
                <label for="fechaCreacionTicke" class="form-label">Fecha Creación de Ticket</label>
                <input type="datetime-local" class="form-control" id="fechaCreacionTicke" name="fechaCreacionTicke" value="{{$datos->fechaCreacionTicke}}">
              </div>
          </div>

        <div class="col-md-4 d-none">
            <label for="id_cliente" class="form-label">Cliente</label>
              <select class="form-select" name="id_cliente">
                @foreach ($clientes as $cliente)
                    @if ($cliente->contacto === $datos->id_cliente)
                    <option value="{{$cliente->contacto}}" selected>{{$cliente->contacto}}</option>
                    @else
                    <option value="{{$cliente->contacto}}">{{$cliente->contacto}}</option>
                    @endif
                @endforeach
              </select>
          </div>

          <div class="col-md-4 d-none">
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

        <div class="col-md-4 d-none">
            <div class="mb-3">
                <label for="numLaboral" class="form-label">NumLaboral</label>
                <input type="number" min="0" class="form-control" id="numLaboral" name="numLaboral" value="{{$datos->numLaboral}}">
              </div>
          </div>

          <div class="col-md-4 mb-3">
            <label for="prioridad" class="form-label">Prioridad</label>
              <select class="form-select" name="prioridad" @error("prioridad")style="border: solid 2px red"@enderror>
                  <option value="" selected disabled>Selccione una prioridad</option>

                  @foreach ($prioridades as $prioridad)
                    @if ($datos->prioridad === $prioridad)
                      <option value="{{$prioridad}}" selected>{{$prioridad}}</option>
                    @else
                      <option value="{{$prioridad}}" >{{$prioridad}}</option>
                    @endif
                  @endforeach
              </select>
          </div>

          <div class="col-md-4">
            <label for="estado" class="form-label">Estado</label>
              <select class="form-select" name="estado" @error("estado")style="border: solid 2px red"@enderror>
                  <option value="" selected disabled>Selccione un estado</option>
                  @foreach ($estados as $estado)
                    @if ($datos->estado === $estado)
                      <option value="{{$estado}}" selected>{{$estado}}</option>
                    @else
                      <option value="{{$estado}}">{{$estado}}</option>
                    @endif
                  @endforeach
              </select>
          </div>

          <div class="col-md-4">
            <label for="origen_asistencia" class="form-label">Origen Asistencia</label>
            <select class="form-select" name="origen_asistencia" @error("origen_asistencia")style="border: solid 2px red"@enderror>
              @foreach ($origen_asistencias as $os)
                @if ($datos->origen_asistencia == $os)
                  <option {{ old('origen_asistencia') == $os ? 'selected' : '' }} selected value="{{$os}}">{{$os}}</option>
                @else
                  <option {{ old('origen_asistencia') == $os ? 'selected' : '' }} value="{{$os}}">{{$os}}</option>
                @endif
              @endforeach
            </select>
          </div>

          <div class="col-md-4 d-none">
              <div class="mb-3">
                <label for="fecha_prevista_cumplimiento" class="form-label">Fecha Prevista</label>
                <input type="datetime-local" class="form-control" id="fecha_prevista_cumplimiento" name="fecha_prevista_cumplimiento" value="{{$datos->fecha_prevista_cumplimiento}}" @error("fecha_prevista_cumplimiento")style="border: solid 2px red"@enderror>
              </div>
          </div>

          <div class="col-md-4 d-none">
            <div class="mb-3">
                <label for="correo_cliente" class="form-label">Correo Cliente</label>
                <input type="text" class="form-control" id="correo_cliente" name="correo_cliente" value="{{$datos->correo_cliente}}" @error("correo_cliente")style="border: solid 2px red"@enderror>
              </div>
          </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="problema" class="form-label">Problema</label>
                <input type="text" class="form-control" id="problema" name="problema" value="{{$datos->problema}}">
              </div>
          </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="solucion" class="form-label">Solución</label>
                <input type="text" class="form-control" id="solucion" name="solucion" value="{{$datos->solucion ? $datos->solucion : old('solucion')}}" @error("solucion")style="border: solid 2px red"@enderror>
              </div>
          </div>

        <div class="col-md-6">
          <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <input type="text" class="form-control" id="observaciones" name="observaciones" value="{{$datos->observaciones ? $datos->observaciones : old('observaciones')}}" @error("observaciones")style="border: solid 2px red"@enderror>
          </div>
        </div>
        
        <div class="mb-3 d-none">
          <label for="interno" class="form-label">interno</label>
          <input type="text" class="form-control" id="interno" name="interno" value="{{$datos->interno}}">
        </div>
    </div>

    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>

    <a href="{{url('/soporte')}}" class="boton regresar"><ion-icon name="arrow-back-outline"></ion-icon>Regresar</a>
</form>
@endsection
