@extends('home')

@section('titulo')
Estado
@endsection

@section('tituloForm')
Actualizar Estado
@endsection

@section('creacion')
<form action="{{url('estados/'.$datos->id)}}" class="row btnAbajo" method="post">
    @csrf
    {{method_field('PATCH')}}
    <div class="col-md-4 row">
        <div class="mb-3 col-12">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" value="{{$datos->estado}}">
          </div>
      </div>

      <div class="d-flex">
        <button type="submit" class="enviar">
          <ion-icon name="save-outline"></ion-icon>
          Guardar
        </button>
    
        <a href="{{url('/estados')}}" class="boton regresar"><ion-icon name="arrow-back-outline"></ion-icon>Regresar</a>
      </div>
</form>
@endsection
