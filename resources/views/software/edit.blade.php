@extends('home')

@section('titulo')
Software
@endsection

@section('tituloForm')
Actualizar Software
@endsection

@section('creacion')
<form action="{{url('software/'.$datos->id)}}" class="row" method="post">
    @csrf
    {{method_field('PATCH')}}
    <div class="col-md-12 row">
        <div class="mb-3 col-4">
            <label for="software" class="form-label">Software</label>
            <input type="text" class="form-control" id="software" name="software" value="{{$datos->software}}">
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
