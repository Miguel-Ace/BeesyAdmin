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
            <label for="colaborador" >Colaborador</label>
              <select class="form-select" name="colaborador">
                @if ($datos->colaborador === 'Roxana Baez')
                    <option value="Roxana Baez" selected>Roxana Baez</option>
                    <option value="Norman Logo">Norman Logo</option>
                    <option value="Edwin Torres">Edwin Torres</option>
                    <option value="Jasson Ulloa">Jasson Ulloa</option>
                @elseif ($datos->colaborador === 'Norman Logo')
                    <option value="Roxana Baez">Roxana Baez</option>
                    <option value="Norman Logo" selected>Norman Logo</option>
                    <option value="Edwin Torres">Edwin Torres</option>
                    <option value="Jasson Ulloa">Jasson Ulloa</option>

                @elseif ($datos->colaborador === 'Edwin Torres')
                    <option value="Roxana Baez">Roxana Baez</option>
                    <option value="Norman Logo">Norman Logo</option>
                    <option value="Edwin Torres" selected>Edwin Torres</option>
                    <option value="Jasson Ulloa">Jasson Ulloa</option>
                @else
                    <option value="Roxana Baez">Roxana Baez</option>
                    <option value="Norman Logo">Norman Logo</option>
                    <option value="Edwin Torres">Edwin Torres</option>
                    <option value="Jasson Ulloa" selected>Jasson Ulloa</option>
                @endif
              </select>
          </div>

        <div class="col-md-4 d-none">
            <div class="mb-3">
                <label for="fechaHoraInicio" class="form-label">Fecha Inicio</label>
                <input type="datetime-local" class="form-control" id="fechaHoraInicio" name="fechaHoraInicio" value="{{$datos->fechaHoraInicio}}">
              </div>
          </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="fechaHoraFinal" class="form-label">Fecha Final</label>
                <input type="datetime-local" class="form-control" id="fechaHoraFinal" name="fechaHoraFinal" value="{{$datos->fechaHoraFinal}}" @error("fechaHoraFinal")style="border: solid 2px red"@enderror>
              </div>
          </div>

        <div class="col-md-4 d-none">
            <label for="id_cliente" class="form-label">Cliente</label>
              <select class="form-select" name="id_cliente">
                @foreach ($clientes as $cliente)
                    @if ($cliente->nombre === $datos->id_cliente)
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
                    @if ($software->software === $datos->software)
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

          <div class="col-md-4">
            <label for="prioridad" class="form-label">Prioridad</label>
              <select class="form-select" name="prioridad" @error("prioridad")style="border: solid 2px red"@enderror>
                  <option value="" selected disabled>Selccione una prioridad</option>
                  
                  @if ($datos->prioridad === 'Leve')
                    <option value="Leve" selected>Leve</option>
                    <option value="Moderado">Moderado</option>
                    <option value="Grave">Grave</option>
                  @elseif ($datos->prioridad === 'Moderado')
                    <option value="Leve">Leve</option>
                    <option value="Moderado" selected>Moderado</option>
                    <option value="Grave">Grave</option>
                  @elseif ($datos->prioridad === 'Grave')
                    <option value="Leve">Leve</option>
                    <option value="Moderado">Moderado</option>
                    <option value="Grave" selected>Grave</option>
                  @endif
              </select>
          </div>

          <div class="col-md-4">
            <label for="estado" class="form-label">Estado</label>
              <select class="form-select" name="estado" @error("estado")style="border: solid 2px red"@enderror>
                  <option value="" selected disabled>Selccione un estado</option>
                  @if ($datos->estado === 'Asignado')
                    <option value="Asignado" selected disabled>Asignado</option>
                    <option value="En Proceso">En proceso</option>
                    <option value="Completo">Completo</option>
                  @elseif ($datos->estado === 'En Proceso')
                    <option value="Asignado" disabled>Asignado</option>
                    <option value="En Proceso" selected>En proceso</option>
                    <option value="Completo">Completo</option>
                  @elseif ($datos->estado === 'Completo')
                    <option value="Asignado" disabled>Asignado</option>
                    <option value="En Proceso">En proceso</option>
                    <option value="Completo" selected>Completo</option>
                  @endif
              </select>
          </div>

          {{-- <div class="col-md-4 d-none">
            <label for="usuario" class="form-label">Usuario</label>
              <select class="form-select" name="usuario" @error("usuario")style="border: solid 2px red"@enderror>
                  <option value="Asignado" selected disabled>Selccione un estado</option>
                  @foreach ($usuarioclientes as $usuariocliente)
                    @if ($datos->usuario == $usuariocliente->id)
                      <option value="{{ $usuariocliente->id }}" selected>{{ $usuariocliente->name }}</option>  
                    @else
                      <option value="{{ $usuariocliente->id }}">{{ $usuariocliente->name }}</option>  
                    @endif
                  @endforeach
              </select>
          </div> --}}

          <div class="col-md-4 d-none">
            <div class="mb-3">
                <label for="correo_cliente" class="form-label">Correo Cliente</label>
                <input type="text" class="form-control" id="correo_cliente" name="correo_cliente" value="{{$datos->correo_cliente}}" @error("correo_cliente")style="border: solid 2px red"@enderror>
              </div>
          </div>

        <div class="col-md-6 d-none">
            <div class="mb-3">
                <label for="problema" class="form-label">Problema</label>
                <input type="text" class="form-control" id="problema" name="problema" value="{{$datos->problema}}">
              </div>
          </div>

        <div class="col-md-8">
            <div class="mb-3">
                <label for="solucion" class="form-label">Solución</label>
                <input type="text" class="form-control" id="solucion" name="solucion" value="{{$datos->solucion}}" @error("solucion")style="border: solid 2px red"@enderror>
              </div>
          </div>

        <div class="col-md-12">
            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <input type="text" class="form-control" id="observaciones" name="observaciones" value="{{$datos->observaciones}}" @error("observaciones")style="border: solid 2px red"@enderror>
              </div>
          </div>

    </div>

    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>

    <a href="{{url('/soporte')}}" class="boton regresar"><ion-icon name="arrow-back-outline"></ion-icon>Regresar</a>
</form>
@endsection
