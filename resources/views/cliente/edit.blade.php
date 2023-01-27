@extends('home')

@section('titulo')
CLIENTES
@endsection

@section('tituloForm')
Actualizar CLIENTES
@endsection

@section('creacion')
<form action="{{url('clientes/'.$datos->id)}}" class="row" method="post">
    @csrf
    {{method_field('PATCH')}}
    <div class="col-md-4">
        <div class="mb-3">
            <label for="cedula" class="form-label">Cédula/RUC</label>
            <input type="text" class="form-control" id="cedula" name="cedula" value="{{$datos->cedula}}">
          </div>
      </div>
      <div class="col-md-4">
          <label for="pais" class="form-label">País</label>
          <select class="form-select" name="pais">
              {{-- <option selected>Seleccione una opción</option> --}}
              @if ($datos->pais === 'Guatemala')
                <option value="Guatemala" selected>Guatemala</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Honduras">Honduras</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Panamá">Panamá</option>
              @elseif ($datos->pais === 'El Salvador')
                <option value="Guatemala">Guatemala</option>
                <option value="El Salvador" selected>El Salvador</option>
                <option value="Honduras">Honduras</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Panamá">Panamá</option>
              @elseif ($datos->pais === 'Honduras')
                <option value="Guatemala">Guatemala</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Honduras" selected>Honduras</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Panamá">Panamá</option>
              @elseif ($datos->pais === 'Nicaragua')
                <option value="Guatemala">Guatemala</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Honduras">Honduras</option>
                <option value="Nicaragua" selected>Nicaragua</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Panamá">Panamá</option>
              @elseif ($datos->pais === 'Costa Rica')
                <option value="Guatemala">Guatemala</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Honduras">Honduras</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Costa Rica" selected>Costa Rica</option>
                <option value="Panamá">Panamá</option>
              @else
                <option value="Guatemala">Guatemala</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Honduras">Honduras</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Panamá" selected>Panamá</option>
              @endif
            </select>
        </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$datos->nombre}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="contacto" class="form-label">Contacto</label>
            <input type="text" class="form-control" id="contacto" name="contacto" value="{{$datos->contacto}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" value="{{$datos->correo}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="number" min="0" class="form-control" id="telefono" name="telefono" value="{{$datos->telefono}}">
          </div>
      </div>

    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>

    <button class="boton regresar">
        <ion-icon name="arrow-back-outline"></ion-icon>
        <a href="{{url('/clientes')}}">Regresar</a>
      </button>
</form>
@endsection
