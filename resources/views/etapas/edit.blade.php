@extends('home')

@section('titulo')
Etapa
@endsection

@section('tituloForm')
Actualizar Etapa
@endsection

@section('creacion')
<form action="{{url('etapas/'.$datos->id)}}" class="row btnAbajo" method="post">
    @csrf
    {{method_field('PATCH')}}
    <div class="col-md-3 row">
        <div class="mb-3 col-12">
            <label for="etapa" class="form-label">Etapas</label>
            <input type="text" class="form-control" id="etapa" name="etapa" value="{{$datos->etapa}}">
          </div>
      </div>

    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>

    <a href="{{url('/etapas')}}" class="boton regresar"><ion-icon name="arrow-back-outline"></ion-icon>Regresar</a>
</form>
@endsection
