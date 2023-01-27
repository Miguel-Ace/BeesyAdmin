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
Agregar Detalle a Este Proyectos
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


<form action="{{url('/plantilla_detalle_proyectos'.'/'.$obtenerId)}}" class="" method="post">
    @csrf
    <div class="row mt-4">
          {{-- <div class="col-md-3">
            <label for="id_proyecto" class="form-label">Proyecto</label>
              <select class="form-select" name="id_proyecto">
                @foreach ($proyectos as $proyecto)
                    <option value="{{$obtenerId}}">{{$proyecto->nombre}}</option>
                @endforeach
              </select>
          </div> --}}

          <div class="col-md-3 d-none">
            <div class="mb-3">
                <label for="id_proyecto" class="form-label">ID Proyecto</label>
                <input type="text" class="form-control" id="id_proyecto" name="id_proyecto" value="{{$obtenerId}}">
              </div>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="num_actividad" class="form-label">Num-Actividad</label>
                <input type="number" class="form-control" min="0" id="num_actividad" name="num_actividad" value="{{old('num_actividad')}}">
              </div>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="nombre_actividad" class="form-label">Nombre Actividad</label>
                <input type="text" class="form-control" id="nombre_actividad" name="nombre_actividad" value="{{old('nombre_actividad')}}">
              </div>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
                <input type="datetime-local" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{old('fecha_inicio')}}">
              </div>
          </div>

        <div class="col-md-3">
            <div class="mb-3">
                <label for="fecha_fin" class="form-label">Fecha Final</label>
                <input type="datetime-local" class="form-control" id="fecha_fin" name="fecha_fin" value="{{old('fecha_fin')}}">
            </div>
        </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="horas_propuestas" class="form-label">Horas Propuestas</label>
                <input type="number" class="form-control" min="0" id="horas_propuestas" name="horas_propuestas" value="{{old('horas_propuestas')}}">
              </div>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="horas_reales" class="form-label">Horas Reales</label>
                <input type="number" class="form-control" min="0" id="horas_reales" name="horas_reales" value="{{old('horas_reales')}}">
              </div>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="meta_hrs_optimas" class="form-label">Meta horas optimas</label>
                <input type="number" class="form-control" min="0" id="meta_hrs_optimas" name="meta_hrs_optimas" value="{{old('meta_hrs_optimas')}}">
              </div>
          </div>

          <div class="col-md-3">
            <label for="id_usuario" class="form-label">Usuario</label>
              <select class="form-select" name="id_usuario">
                @foreach ($usuarios as $usuario)
                    <option value="{{$usuario->id}}">{{$usuario->nombre}}</option>
                @endforeach
              </select>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="ejecutor_cliente" class="form-label">Ejecutor Cliente</label>
                <input type="text" class="form-control" id="ejecutor_cliente" name="ejecutor_cliente" value="{{old('ejecutor_cliente')}}">
              </div>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" value="{{old('tipo')}}">
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
                    <option value="{{$estado->id}}">{{$estado->estado}}</option>
                @endforeach
              </select>
          </div>

          <div class="col-md-3 mb-3">
            <label for="id_usuario" class="form-label">Etapa</label>
              <select class="form-select" name="id_etapa">
                @foreach ($etapas as $etapa)
                    <option value="{{$etapa->id}}">{{$etapa->etapa}}</option>
                @endforeach
              </select>
          </div>

          <div class="col-md-12">
            <div class="mb-3">
                <label for="notas" class="form-label">Notas</label>
                <input type="text" class="form-control" id="notas" name="notas" value="{{old('notas')}}">
              </div>
          </div>
          <button type="submit" id="btnEnviar" class="enviar">
            <ion-icon name="save-outline"></ion-icon>
            Guardar
          </button>

          <a href="{{url('/plantilla_proyectos')}}" class="enviar text-left col-12">
              <ion-icon name="arrow-back-outline"></ion-icon>
              Proyectos
          </a>

          @foreach ($datos as $dato)
            <a href="{{url('plantilla_detalle_proyectos/'.$dato->id.'/'.$obtenerId)}}" class="enviar text-left col-12">
                <ion-icon name="eye-outline"></ion-icon>
                Ver
            </a>
          @endforeach
    </div>

</form>
@endsection

@section('tituloTabla')
{{-- Breve descripción del Proyectos --}}

<form action="{{url('/plantilla_detalle_proyectos')}}" method="get" class="formularioBuscador d-none">
    <input type="text" name="buscar" id="buscar" placeholder="Buscar" value="{{$busqueda}}">
    <input type="submit" value="Buscar">
</form>
@endsection

@section('tablas')
<div class="col-md-12 fs-6 d-none">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">Proyecto</th>
                <th scope="col">Num Actividad</th>
                <th scope="col">Nombre Actividad</th>
                <th scope="col">Fecha Inicio</th>
                <th scope="col">Fecha Final</th>
                <th scope="col">Horas Propuestas</th>
                <th scope="col">Horas Reales</th>
                <th scope="col">Meta horas optima</th>
                <th scope="col">Rendimiento</th>
                {{-- <th scope="col">Usuario</th>
                <th scope="col">Ejecutor Cliente</th>
                <th scope="col">Tipo</th>
                <th scope="col">Estado</th>
                <th scope="col">Etapa</th>
                <th scope="col">Notas</th> --}}
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($datos as $dato)
                <tr>
                    <td>{{$dato->proyectos->nombre}}</td>
                    <td>{{$dato->num_actividad}}</td>
                    <td>{{$dato->nombre_actividad}}</td>
                    <td>{{$dato->fecha_inicio}}</td>
                    <td>{{$dato->fecha_fin}}</td>
                    <td>{{$dato->horas_propuestas}}</td>
                    <td>{{$dato->horas_reales}}</td>
                    <td>{{$dato->meta_hrs_optimas}}</td>
                    <td>{{$dato->rendimiento}}</td>
                    {{-- <td>{{$dato->usuarios->nombre}}</td>
                    <td>{{$dato->ejecutor_cliente}}</td>
                    <td>{{$dato->tipo}}</td>
                    <td>{{$dato->estados->estado}}</td>
                    <td>{{$dato->etapas->etapa}}</td>
                    <td>{{$dato->notas}}</td> --}}
                    <td class="d-flex">
                        <a href="{{url('plantilla_detalle_proyectos/'.$dato->id.'/'.$obtenerId)}}" class="show"><ion-icon name="eye-outline"></ion-icon></a>
                        |
                        <a href="{{url('plantilla_detalle_proyectos/'.$dato->id.'/'.'edit/'.$obtenerId)}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        {{-- |
                        <form action="{{url('detalle_proyectos/'.$dato->id)}}" method="POST" class="delete">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit"><ion-icon name="beaker-outline"></ion-icon></button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
