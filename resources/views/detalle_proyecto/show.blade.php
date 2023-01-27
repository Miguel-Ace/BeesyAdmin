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
Ver Detalle del Proyecto
@endsection

@section('creacion')
    <div class="row col-12 fs-6 p-3 mt-3">
        <div class="col-3 mb-3">
            <p><span class="negritaSpan">Proyecto:</span> {{$datos->proyectos->nombre}}</p>
        </div>

        <div class="col-3 mb-3">
            <p><span class="negritaSpan">Numero de actividad:</span> {{$datos->num_actividad}}</p>
        </div>

        <div class="col-3 mb-3">
            <p><span class="negritaSpan">Nombre de actividad:</span> {{$datos->nombre_actividad}}</p>
        </div>

        <div class="col-3 mb-3">
            <p><span class="negritaSpan">Fecha de Inicio:</span> {{$datos->fecha_inicio}}</p>
        </div>

        <div class="col-3 mb-3">
            <p><span class="negritaSpan">Fecha Final:</span> {{$datos->fecha_fin}}</p>
        </div>

        <div class="col-3 mb-3">
            <p><span class="negritaSpan">Horas Propuestas:</span> {{$datos->horas_propuestas}}</p>
        </div>

        <div class="col-3 mb-3">
            <p><span class="negritaSpan">Horas Reales:</span> {{$datos->horas_reales}}</p>
        </div>

        <div class="col-3 mb-3">
            <p><span class="negritaSpan">Meta de hora optima:</span> {{$datos->meta_hrs_optimas}}</p>
        </div>

        <div class="col-3 mb-3">
            <p><span class="negritaSpan">Usuario:</span> {{$datos->usuarios->nombre}}</p>
        </div>

        <div class="col-3 mb-3">
            <p><span class="negritaSpan">Ejecutor Cliente:</span> {{$datos->ejecutor_cliente}}</p>
        </div>

        <div class="col-3 mb-3">
            <p><span class="negritaSpan">Tipo:</span> {{$datos->tipo}}</p>
        </div>

        <div class="col-3 mb-3">
            <p><span class="negritaSpan">Rendimiento:</span> {{$datos->rendimiento}}</p>
        </div>

        <div class="col-3 mb-3">
            <p><span class="negritaSpan">Etapa:</span> {{$datos->etapas->etapa}}</p>
        </div>

        <div class="col-3 mb-3">
            <p><span class="negritaSpan">Estado:</span> {{$datos->estados->estado}}</p>
        </div>

        <div class="col-12 mb-3">
            <p><span class="negritaSpan">Notas:</span> {{$datos->notas}}</p>
        </div>

        <button class="boton regresar2 text-left mb-3 col-12">
            <ion-icon name="arrow-back-outline"></ion-icon>
            <a href="{{url('/detalle_proyectos?buscar='.$obtenerId)}}">Regresar</a>
          </button>

        <button class="boton regresar2 text-left mb-3 col-12">
            <ion-icon name="arrow-back-outline"></ion-icon>
            <a href="{{url('detalle_proyectos/'.$datos->id.'/'.'edit/'.$obtenerId)}}">Editar</a>
          </button>
          
    </div>
@endsection
