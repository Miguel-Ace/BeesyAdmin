@extends('home')

@section('titulo')
Software
@endsection

@section('tituloForm')
Actualizar Software
@endsection

@section('creacion')
<form action="{{url('software/'.$datos->id)}}" class="row btnAbajo" method="post">
    @csrf
    {{method_field('PATCH')}}
    <div class="col-md-4 row">
        <div class="mb-3 col-12">
            <label for="software" class="form-label">Software</label>
            <input type="text" class="form-control" id="software" name="software" value="{{$datos->software}}">
          </div>
      </div>

      <div class="d-flex pl-0">
        <button type="submit" class="enviar">
          <ion-icon name="save-outline"></ion-icon>
          Guardar
        </button>
    
        <a href="{{url('/software')}}" class="boton regresar"><ion-icon name="arrow-back-outline"></ion-icon> Regresar</a>
      </div>
</form>
@endsection
