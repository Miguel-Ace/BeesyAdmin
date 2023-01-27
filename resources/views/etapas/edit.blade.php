@extends('home')

@section('titulo')
Etapa
@endsection

@section('tituloForm')
Actualizar Etapa
@endsection

@section('creacion')
<form action="{{url('etapas/'.$datos->id)}}" class="row" method="post">
    @csrf
    {{method_field('PATCH')}}
    <div class="col-md-12 row">
        <div class="mb-3 col-4">
            <label for="etapa" class="form-label">Etapas</label>
            <input type="text" class="form-control" id="etapa" name="etapa" value="{{$datos->etapa}}">
          </div>
      </div>

    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>

    <button class="boton regresar">
        <ion-icon name="arrow-back-outline"></ion-icon>
        <a href="{{url('/etapas')}}">Regresar</a>
      </button>
</form>
@endsection
