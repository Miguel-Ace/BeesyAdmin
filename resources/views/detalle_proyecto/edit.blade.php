@extends('home')

@section('titulo')

Detalle del Proyecto:
@foreach ($proyectos as $proyecto)
    @if ($obtenerId == $proyecto->id)
        <span style="color:rgb(64, 129, 64)">{{$proyecto->nombre}}</span>
    @endif
@endforeach

@endsection

@section('tituloForm')
Actualizar Detalle del Proyecto
@endsection

@section('creacion')
<form action="{{url('detalle_proyectos/'.$datos->id.'/'.$obtenerId)}}" class="row" method="post">
    @csrf
    {{method_field('PATCH')}}
    <div class="row">
        {{-- <div class="col-md-3">
            <label for="id_proyecto" class="form-label">Proyecto</label>
              <select class="form-select" name="id_proyecto">
                @foreach ($proyectos as $proyecto)
                    @if ($proyecto->id === $datos->proyectos->id)
                        <option value="{{$proyecto->id}}" selected>{{$proyecto->nombre}}</option>
                    @else
                        <option value="{{$proyecto->id}}">{{$proyecto->nombre}}</option>
                    @endif
                @endforeach
              </select>
          </div> --}}

          <div class="col-md-3 d-none">
            <div class="mb-3">
                <label for="id_proyecto" class="form-label">ID Proyecto</label>
                <input type="text" class="form-control" id="id_proyecto" name="id_proyecto" value="{{$datos->id_proyecto}}">
              </div>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="num_actividad" class="form-label">Num-Actividad</label>
                <input type="number" class="form-control" min="0" id="num_actividad" name="num_actividad" value="{{$datos->num_actividad}}">
              </div>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="nombre_actividad" class="form-label">Nombre Actividad</label>
                <input type="text" class="form-control" id="nombre_actividad" name="nombre_actividad" value="{{$datos->nombre_actividad}}">
              </div>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
                <input type="datetime-local" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{$datos->fecha_inicio}}">
              </div>
          </div>

        <div class="col-md-3">
            <div class="mb-3">
                <label for="fecha_fin" class="form-label">Fecha Final</label>
                <input type="datetime-local" class="form-control" id="fecha_fin" name="fecha_fin" value="{{$datos->fecha_fin}}">
            </div>
        </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="horas_propuestas" class="form-label">Horas Propuestas</label>
                <input type="number" class="form-control" min="0" id="horas_propuestas" name="horas_propuestas" value="{{$datos->horas_propuestas}}">
              </div>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="horas_reales" class="form-label">Horas Reales</label>
                <input type="number" class="form-control" min="0" id="horas_reales" name="horas_reales" value="{{$datos->horas_reales}}">
              </div>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="meta_hrs_optimas" class="form-label">Meta horas optimas</label>
                <input type="number" class="form-control" min="0" id="meta_hrs_optimas" name="meta_hrs_optimas" value="{{$datos->meta_hrs_optimas}}">
              </div>
          </div>

          <div class="col-md-3">
            <label for="id_usuario" class="form-label">Usuario</label>
              <select class="form-select" name="id_usuario">
                @foreach ($usuarios as $usuario)
                    @if ($usuario->id === $datos->usuarios->id)
                        <option value="{{$usuario->id}}" selected>{{$usuario->nombre}}</option>
                    @else
                        <option value="{{$usuario->id}}">{{$usuario->nombre}}</option>
                    @endif
                @endforeach
              </select>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="ejecutor_cliente" class="form-label">Ejecutor Cliente</label>
                <input type="text" class="form-control" id="ejecutor_cliente" name="ejecutor_cliente" value="{{$datos->ejecutor_cliente}}">
              </div>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" value="{{$datos->tipo}}">
              </div>
          </div>

          <div class="col-md-3 d-none">
            <div class="mb-3">
                <label for="rendimiento" class="form-label">Rendimiento</label>
                <input type="text" class="form-control" id="rendimiento" name="rendimiento" value="">
              </div>
          </div>

          <div class="col-md-3">
            <label for="id_usuario" class="form-label">Estado</label>
              <select class="form-select" name="id_estado">
                @foreach ($estados as $estado)
                    @if ($estado->id === $datos->estados->id)
                        <option value="{{$estado->id}}" selected>{{$estado->estado}}</option>
                    @else
                        <option value="{{$estado->id}}">{{$estado->estado}}</option>
                    @endif
                @endforeach
              </select>
          </div>

          <div class="col-md-3 mb-3">
            <label for="id_usuario" class="form-label">Etapa</label>
              <select class="form-select" name="id_etapa">
                @foreach ($etapas as $etapa)
                    @if ($etapa->id === $datos->etapas->id)
                        <option value="{{$etapa->id}}" selected>{{$etapa->etapa}}</option>
                    @else
                        <option value="{{$etapa->id}}">{{$etapa->etapa}}</option>
                    @endif
                @endforeach
              </select>
          </div>

          <div class="col-md-12">
            <div class="mb-3">
                <label for="notas" class="form-label">Notas</label>
                <input type="text" class="form-control" id="notas" name="notas" value="{{$datos->notas}}">
              </div>
          </div>
    </div>

    <button type="submit" id="btnEnviar" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>

    <button class="boton regresar">
        <ion-icon name="arrow-back-outline"></ion-icon>
        <a href="{{url('/detalle_proyectos'.'/'.$datos->id.'/'.$obtenerId)}}">Regresar</a>
      </button>

</form>
@endsection
