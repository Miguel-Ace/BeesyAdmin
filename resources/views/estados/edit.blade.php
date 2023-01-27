@extends('home')

@section('titulo')
Estado
@endsection

@section('tituloForm')
Actualizar Estado
@endsection

@section('creacion')
<form action="{{url('estados/'.$datos->id)}}" class="row" method="post">
    @csrf
    {{method_field('PATCH')}}
    <div class="col-md-12 row">
        <div class="mb-3 col-4">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" value="{{$datos->estado}}">
          </div>
      </div>

    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>

    <button class="boton regresar">
        <ion-icon name="arrow-back-outline"></ion-icon>
        <a href="{{url('/software')}}">Regresar</a>
      </button>
</form>
@endsection
