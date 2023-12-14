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
                @if ($datos->colaborador === 'Roxana Baez')
                    <option value="Roxana Baez" selected>Roxana Baez</option>
                    <option value="Norman Logo">Norman Logo</option>
                    <option value="Edwin Torres">Edwin Torres</option>
                    <option value="Jasson Ulloa">Jasson Ulloa</option>
                    <option value="José Rizo">José Rizo</option>
                    <option value="Kenneth Granados">Kenneth Granados</option>
                    <option value="Ramses Rivas">Ramses Rivas</option>
                    <option value="Mauro Pettyn">Mauro Pettyn</option>
                    <option value="Deyna López">Deyna López</option>
                @elseif ($datos->colaborador === 'Norman Logo')
                    <option value="Roxana Baez">Roxana Baez</option>
                    <option value="Norman Logo" selected>Norman Logo</option>
                    <option value="Edwin Torres">Edwin Torres</option>
                    <option value="Jasson Ulloa">Jasson Ulloa</option>
                    <option value="José Rizo">José Rizo</option>
                    <option value="Kenneth Granados">Kenneth Granados</option>
                    <option value="Ramses Rivas">Ramses Rivas</option>
                    <option value="Mauro Pettyn">Mauro Pettyn</option>
                    <option value="Deyna López">Deyna López</option>
                @elseif ($datos->colaborador === 'Edwin Torres')
                    <option value="Roxana Baez">Roxana Baez</option>
                    <option value="Norman Logo">Norman Logo</option>
                    <option value="Edwin Torres" selected>Edwin Torres</option>
                    <option value="Jasson Ulloa">Jasson Ulloa</option>
                    <option value="José Rizo">José Rizo</option>
                    <option value="Kenneth Granados">Kenneth Granados</option>
                    <option value="Ramses Rivas">Ramses Rivas</option>
                    <option value="Mauro Pettyn">Mauro Pettyn</option>
                    <option value="Deyna López">Deyna López</option>
                @elseif ($datos->colaborador === 'Jasson Ulloa')
                    <option value="Roxana Baez">Roxana Baez</option>
                    <option value="Norman Logo">Norman Logo</option>
                    <option value="Edwin Torres">Edwin Torres</option>
                    <option value="Jasson Ulloa" selected>Jasson Ulloa</option>
                    <option value="José Rizo">José Rizo</option>
                    <option value="Kenneth Granados">Kenneth Granados</option>
                    <option value="Ramses Rivas">Ramses Rivas</option>
                    <option value="Mauro Pettyn">Mauro Pettyn</option>
                    <option value="Deyna López">Deyna López</option>
                @elseif ($datos->colaborador === 'José Rizo')
                    <option value="Roxana Baez">Roxana Baez</option>
                    <option value="Norman Logo">Norman Logo</option>
                    <option value="Edwin Torres">Edwin Torres</option>
                    <option value="Jasson Ulloa">Jasson Ulloa</option>
                    <option value="José Rizo" selected>José Rizo</option>
                    <option value="Kenneth Granados">Kenneth Granados</option>
                    <option value="Ramses Rivas">Ramses Rivas</option>
                    <option value="Mauro Pettyn">Mauro Pettyn</option>
                    <option value="Deyna López">Deyna López</option>
                @elseif ($datos->colaborador === 'Kenneth Granados')
                    <option value="Roxana Baez">Roxana Baez</option>
                    <option value="Norman Logo">Norman Logo</option>
                    <option value="Edwin Torres">Edwin Torres</option>
                    <option value="Jasson Ulloa">Jasson Ulloa</option>
                    <option value="José Rizo">José Rizo</option>
                    <option value="Kenneth Granados" selected>Kenneth Granados</option>
                    <option value="Ramses Rivas">Ramses Rivas</option>
                    <option value="Mauro Pettyn">Mauro Pettyn</option>
                    <option value="Deyna López">Deyna López</option>
                @elseif ($datos->colaborador === 'Ramses Rivas')
                    <option value="Roxana Baez">Roxana Baez</option>
                    <option value="Norman Logo">Norman Logo</option>
                    <option value="Edwin Torres">Edwin Torres</option>
                    <option value="Jasson Ulloa">Jasson Ulloa</option>
                    <option value="José Rizo">José Rizo</option>
                    <option value="Kenneth Granados">Kenneth Granados</option>
                    <option value="Ramses Rivas" selected>Ramses Rivas</option>
                    <option value="Mauro Pettyn">Mauro Pettyn</option>
                    <option value="Deyna López">Deyna López</option>
                @elseif ($datos->colaborador === 'Mauro Pettyn')
                    <option value="Roxana Baez">Roxana Baez</option>
                    <option value="Norman Logo">Norman Logo</option>
                    <option value="Edwin Torres">Edwin Torres</option>
                    <option value="Jasson Ulloa">Jasson Ulloa</option>
                    <option value="José Rizo">José Rizo</option>
                    <option value="Kenneth Granados">Kenneth Granados</option>
                    <option value="Ramses Rivas">Ramses Rivas</option>
                    <option value="Mauro Pettyn" selected>Mauro Pettyn</option>
                    <option value="Deyna López">Deyna López</option>
                @else
                    <option value="Roxana Baez">Roxana Baez</option>
                    <option value="Norman Logo">Norman Logo</option>
                    <option value="Edwin Torres">Edwin Torres</option>
                    <option value="Jasson Ulloa">Jasson Ulloa</option>
                    <option value="José Rizo">José Rizo</option>
                    <option value="Kenneth Granados">Kenneth Granados</option>
                    <option value="Ramses Rivas">Ramses Rivas</option>
                    <option value="Mauro Pettyn">Mauro Pettyn</option>
                    <option value="Deyna López" selected>Deyna López</option>
                @endif
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

                  {{-- @if ($datos->prioridad != 'leve')
                    <option value="Moderado" {{old('prioridad') == 'Moderado' ? 'selected' : ''}}>Moderado</option>
                    <option value="Alta" {{old('prioridad') == 'Alta' ? 'selected' : ''}}>Alta</option>
                  @elseif ($datos->prioridad != 'Moderado')
                    <option value="Leve" {{old('prioridad') == 'Leve' ? 'selected' : ''}}>Leve</option>
                    <option value="Alta" {{old('prioridad') == 'Alta' ? 'selected' : ''}}>Alta</option>
                  @else
                    <option value="Leve" {{old('prioridad') == 'Leve' ? 'selected' : ''}}>Leve</option>
                    <option value="Moderado" {{old('prioridad') == 'Moderado' ? 'selected' : ''}}>Moderado</option>
                  @endif --}}

                  @if ($datos->prioridad === 'Leve')
                    <option value="Leve" selected>Leve</option>
                    <option value="Moderado">Moderado</option>
                    <option value="Alta">Alta</option>
                  @elseif ($datos->prioridad === 'Moderado')
                    <option value="Leve">Leve</option>
                    <option value="Moderado" selected>Moderado</option>
                    <option value="Alta">Alta</option>
                  @elseif ($datos->prioridad === 'Alta')
                    <option value="Leve">Leve</option>
                    <option value="Moderado">Moderado</option>
                    <option value="Alta" selected>Alta</option>
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

          <div class="col-md-4">
            <label for="origen_asistencia" class="form-label">Origen Asistencia</label>
            <select class="form-select" name="origen_asistencia" @error("origen_asistencia")style="border: solid 2px red"@enderror>
              @if ($datos->origen_asistencia == "Asistencia")
                <option {{ old('origen_asistencia') == 'Asistencia' ? 'selected' : '' }} selected value="Asistencia">Asistencia</option>
                <option {{ old('origen_asistencia') == 'Garantía' ? 'selected' : '' }} value="Garantía">Garantía</option>
                <option {{ old('origen_asistencia') == 'Instalación' ? 'selected' : '' }} value="Instalación">Instalación</option>
                <option {{ old('origen_asistencia') == 'Configuración' ? 'selected' : '' }} value="Configuración">Configuración</option>
                <option {{ old('origen_asistencia') == 'Capacitación' ? 'selected' : '' }} value="Capacitación">Capacitación</option>
                <option {{ old('origen_asistencia') == 'Mejora' ? 'selected' : '' }} value="Mejora">Mejora</option>
                <option {{ old('origen_asistencia') == 'Especialización' ? 'selected' : '' }} value="Especialización">Especialización</option>
                <option {{ old('origen_asistencia') == 'Importación' ? 'selected' : '' }} value="Importación">Importación</option>
                <option {{ old('origen_asistencia') == 'Servidor' ? 'selected' : '' }} value="Servidor">Servidor</option>
                <option {{ old('origen_asistencia') == 'Reunión' ? 'selected' : '' }} value="Reunión">Reunión</option>
              @elseif ($datos->origen_asistencia == "Garantía")
                <option {{ old('origen_asistencia') == 'Asistencia' ? 'selected' : '' }} value="Asistencia">Asistencia</option>
                <option {{ old('origen_asistencia') == 'Garantía' ? 'selected' : '' }} selected value="Garantía">Garantía</option>
                <option {{ old('origen_asistencia') == 'Instalación' ? 'selected' : '' }} value="Instalación">Instalación</option>
                <option {{ old('origen_asistencia') == 'Configuración' ? 'selected' : '' }} value="Configuración">Configuración</option>
                <option {{ old('origen_asistencia') == 'Capacitación' ? 'selected' : '' }} value="Capacitación">Capacitación</option>
                <option {{ old('origen_asistencia') == 'Mejora' ? 'selected' : '' }} value="Mejora">Mejora</option>
                <option {{ old('origen_asistencia') == 'Especialización' ? 'selected' : '' }} value="Especialización">Especialización</option>
                <option {{ old('origen_asistencia') == 'Importación' ? 'selected' : '' }} value="Importación">Importación</option>
                <option {{ old('origen_asistencia') == 'Servidor' ? 'selected' : '' }} value="Servidor">Servidor</option>
                <option {{ old('origen_asistencia') == 'Reunión' ? 'selected' : '' }} value="Reunión">Reunión</option>
              @elseif ($datos->origen_asistencia == "Instalación")
                <option {{ old('origen_asistencia') == 'Asistencia' ? 'selected' : '' }} value="Asistencia">Asistencia</option>
                <option {{ old('origen_asistencia') == 'Garantía' ? 'selected' : '' }} value="Garantía">Garantía</option>
                <option {{ old('origen_asistencia') == 'Instalación' ? 'selected' : '' }} selected value="Instalación">Instalación</option>
                <option {{ old('origen_asistencia') == 'Configuración' ? 'selected' : '' }} value="Configuración">Configuración</option>
                <option {{ old('origen_asistencia') == 'Capacitación' ? 'selected' : '' }} value="Capacitación">Capacitación</option>
                <option {{ old('origen_asistencia') == 'Mejora' ? 'selected' : '' }} value="Mejora">Mejora</option>
                <option {{ old('origen_asistencia') == 'Especialización' ? 'selected' : '' }} value="Especialización">Especialización</option>
                <option {{ old('origen_asistencia') == 'Importación' ? 'selected' : '' }} value="Importación">Importación</option>
                <option {{ old('origen_asistencia') == 'Servidor' ? 'selected' : '' }} value="Servidor">Servidor</option>
                <option {{ old('origen_asistencia') == 'Reunión' ? 'selected' : '' }} value="Reunión">Reunión</option>
              @elseif ($datos->origen_asistencia == "Configuración")
                <option {{ old('origen_asistencia') == 'Asistencia' ? 'selected' : '' }} value="Asistencia">Asistencia</option>
                <option {{ old('origen_asistencia') == 'Garantía' ? 'selected' : '' }} value="Garantía">Garantía</option>
                <option {{ old('origen_asistencia') == 'Instalación' ? 'selected' : '' }} value="Instalación">Instalación</option>
                <option {{ old('origen_asistencia') == 'Configuración' ? 'selected' : '' }} selected value="Configuración">Configuración</option>
                <option {{ old('origen_asistencia') == 'Capacitación' ? 'selected' : '' }} value="Capacitación">Capacitación</option>
                <option {{ old('origen_asistencia') == 'Mejora' ? 'selected' : '' }} value="Mejora">Mejora</option>
                <option {{ old('origen_asistencia') == 'Especialización' ? 'selected' : '' }} value="Especialización">Especialización</option>
                <option {{ old('origen_asistencia') == 'Importación' ? 'selected' : '' }} value="Importación">Importación</option>
                <option {{ old('origen_asistencia') == 'Servidor' ? 'selected' : '' }} value="Servidor">Servidor</option>
                <option {{ old('origen_asistencia') == 'Reunión' ? 'selected' : '' }} value="Reunión">Reunión</option>
              @elseif ($datos->origen_asistencia == "Capacitación")
                <option {{ old('origen_asistencia') == 'Asistencia' ? 'selected' : '' }} value="Asistencia">Asistencia</option>
                <option {{ old('origen_asistencia') == 'Garantía' ? 'selected' : '' }} value="Garantía">Garantía</option>
                <option {{ old('origen_asistencia') == 'Instalación' ? 'selected' : '' }} value="Instalación">Instalación</option>
                <option {{ old('origen_asistencia') == 'Configuración' ? 'selected' : '' }} value="Configuración">Configuración</option>
                <option {{ old('origen_asistencia') == 'Capacitación' ? 'selected' : '' }} selected value="Capacitación">Capacitación</option>
                <option {{ old('origen_asistencia') == 'Mejora' ? 'selected' : '' }} value="Mejora">Mejora</option>
                <option {{ old('origen_asistencia') == 'Especialización' ? 'selected' : '' }} value="Especialización">Especialización</option>
                <option {{ old('origen_asistencia') == 'Importación' ? 'selected' : '' }} value="Importación">Importación</option>
                <option {{ old('origen_asistencia') == 'Servidor' ? 'selected' : '' }} value="Servidor">Servidor</option>
                <option {{ old('origen_asistencia') == 'Reunión' ? 'selected' : '' }} value="Reunión">Reunión</option>
              @elseif ($datos->origen_asistencia == "Mejora")
                <option {{ old('origen_asistencia') == 'Asistencia' ? 'selected' : '' }} value="Asistencia">Asistencia</option>
                <option {{ old('origen_asistencia') == 'Garantía' ? 'selected' : '' }} value="Garantía">Garantía</option>
                <option {{ old('origen_asistencia') == 'Instalación' ? 'selected' : '' }} value="Instalación">Instalación</option>
                <option {{ old('origen_asistencia') == 'Configuración' ? 'selected' : '' }} value="Configuración">Configuración</option>
                <option {{ old('origen_asistencia') == 'Capacitación' ? 'selected' : '' }} value="Capacitación">Capacitación</option>
                <option {{ old('origen_asistencia') == 'Mejora' ? 'selected' : '' }} selected value="Mejora">Mejora</option>
                <option {{ old('origen_asistencia') == 'Especialización' ? 'selected' : '' }} value="Especialización">Especialización</option>
                <option {{ old('origen_asistencia') == 'Importación' ? 'selected' : '' }} value="Importación">Importación</option>
                <option {{ old('origen_asistencia') == 'Servidor' ? 'selected' : '' }} value="Servidor">Servidor</option>
                <option {{ old('origen_asistencia') == 'Reunión' ? 'selected' : '' }} value="Reunión">Reunión</option>
              @elseif ($datos->origen_asistencia == "Especialización")
                <option {{ old('origen_asistencia') == 'Asistencia' ? 'selected' : '' }} value="Asistencia">Asistencia</option>
                <option {{ old('origen_asistencia') == 'Garantía' ? 'selected' : '' }} value="Garantía">Garantía</option>
                <option {{ old('origen_asistencia') == 'Instalación' ? 'selected' : '' }} value="Instalación">Instalación</option>
                <option {{ old('origen_asistencia') == 'Configuración' ? 'selected' : '' }} value="Configuración">Configuración</option>
                <option {{ old('origen_asistencia') == 'Capacitación' ? 'selected' : '' }} value="Capacitación">Capacitación</option>
                <option {{ old('origen_asistencia') == 'Mejora' ? 'selected' : '' }} value="Mejora">Mejora</option>
                <option {{ old('origen_asistencia') == 'Especialización' ? 'selected' : '' }} selected value="Especialización">Especialización</option>
                <option {{ old('origen_asistencia') == 'Importación' ? 'selected' : '' }} value="Importación">Importación</option>
                <option {{ old('origen_asistencia') == 'Servidor' ? 'selected' : '' }} value="Servidor">Servidor</option>
                <option {{ old('origen_asistencia') == 'Reunión' ? 'selected' : '' }} value="Reunión">Reunión</option>
                @elseif ($datos->origen_asistencia == "Importación")
                <option {{ old('origen_asistencia') == 'Asistencia' ? 'selected' : '' }} value="Asistencia">Asistencia</option>
                <option {{ old('origen_asistencia') == 'Garantía' ? 'selected' : '' }} value="Garantía">Garantía</option>
                <option {{ old('origen_asistencia') == 'Instalación' ? 'selected' : '' }} value="Instalación">Instalación</option>
                <option {{ old('origen_asistencia') == 'Configuración' ? 'selected' : '' }} value="Configuración">Configuración</option>
                <option {{ old('origen_asistencia') == 'Capacitación' ? 'selected' : '' }} value="Capacitación">Capacitación</option>
                <option {{ old('origen_asistencia') == 'Mejora' ? 'selected' : '' }} value="Mejora">Mejora</option>
                <option {{ old('origen_asistencia') == 'Especialización' ? 'selected' : '' }} value="Especialización">Especialización</option>
                <option {{ old('origen_asistencia') == 'Importación' ? 'selected' : '' }} selected value="Importación">Importación</option>
                <option {{ old('origen_asistencia') == 'Servidor' ? 'selected' : '' }} value="Servidor">Servidor</option>
                <option {{ old('origen_asistencia') == 'Reunión' ? 'selected' : '' }} value="Reunión">Reunión</option>
                @elseif ($datos->origen_asistencia == "Servidor")
                <option {{ old('origen_asistencia') == 'Asistencia' ? 'selected' : '' }} value="Asistencia">Asistencia</option>
                <option {{ old('origen_asistencia') == 'Garantía' ? 'selected' : '' }} value="Garantía">Garantía</option>
                <option {{ old('origen_asistencia') == 'Instalación' ? 'selected' : '' }} value="Instalación">Instalación</option>
                <option {{ old('origen_asistencia') == 'Configuración' ? 'selected' : '' }} value="Configuración">Configuración</option>
                <option {{ old('origen_asistencia') == 'Capacitación' ? 'selected' : '' }} value="Capacitación">Capacitación</option>
                <option {{ old('origen_asistencia') == 'Mejora' ? 'selected' : '' }} value="Mejora">Mejora</option>
                <option {{ old('origen_asistencia') == 'Especialización' ? 'selected' : '' }} value="Especialización">Especialización</option>
                <option {{ old('origen_asistencia') == 'Importación' ? 'selected' : '' }} value="Importación">Importación</option>
                <option {{ old('origen_asistencia') == 'Servidor' ? 'selected' : '' }} selected value="Servidor">Servidor</option>
                <option {{ old('origen_asistencia') == 'Reunión' ? 'selected' : '' }} value="Reunión">Reunión</option>
                @else
                <option {{ old('origen_asistencia') == 'Asistencia' ? 'selected' : '' }} value="Asistencia">Asistencia</option>
                <option {{ old('origen_asistencia') == 'Garantía' ? 'selected' : '' }} value="Garantía">Garantía</option>
                <option {{ old('origen_asistencia') == 'Instalación' ? 'selected' : '' }} value="Instalación">Instalación</option>
                <option {{ old('origen_asistencia') == 'Configuración' ? 'selected' : '' }} value="Configuración">Configuración</option>
                <option {{ old('origen_asistencia') == 'Capacitación' ? 'selected' : '' }} value="Capacitación">Capacitación</option>
                <option {{ old('origen_asistencia') == 'Mejora' ? 'selected' : '' }} value="Mejora">Mejora</option>
                <option {{ old('origen_asistencia') == 'Especialización' ? 'selected' : '' }} value="Especialización">Especialización</option>
                <option {{ old('origen_asistencia') == 'Importación' ? 'selected' : '' }} value="Importación">Importación</option>
                <option {{ old('origen_asistencia') == 'Servidor' ? 'selected' : '' }} value="Servidor">Servidor</option>
                <option {{ old('origen_asistencia') == 'Reunión' ? 'selected' : '' }} selected value="Reunión">Reunión</option>
              @endif
            </select>
          </div>

          <div class="col-md-4 d-none">
              <div class="mb-3">
                <label for="fecha_prevista_cumplimiento" class="form-label">Fecha Prevista</label>
                <input type="datetime-local" class="form-control" id="fecha_prevista_cumplimiento" name="fecha_prevista_cumplimiento" value="{{$datos->fecha_prevista_cumplimiento}}" @error("fecha_prevista_cumplimiento")style="border: solid 2px red"@enderror>
              </div>
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
