@extends('home')

@section('titulo')
Clientes
@endsection

@section('tituloForm')
Agregar Clientes
@endsection

@section('creacion')
@if ($errors->any())
    <ul class="bg-white text-danger p-2">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form action="{{url('/clientes')}}" class="row" method="post">
    @csrf
    <div class="col-md-4">
        <div class="mb-3">
            <label for="cedula" class="form-label">Cédula/RUC</label>
            <input type="text" class="form-control" id="cedula" name="cedula" value="{{old('cedula')}}">
          </div>
      </div>
      <div class="col-md-4">
          <label for="pais" class="form-label">País</label>
          <select class="form-select" name="pais">
              {{-- <option selected>Seleccione una opción</option> --}}
              <option value="Guatemala">Guatemala</option>
              <option value="El Salvador">El Salvador</option>
              <option value="Honduras">Honduras</option>
              <option value="Nicaragua">Nicaragua</option>
              <option value="Costa Rica">Costa Rica</option>
              <option value="Panamá">Panamá</option>
            </select>
        </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="contacto" class="form-label">Contacto</label>
            <input type="text" class="form-control" id="contacto" name="contacto" value="{{old('contacto')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" value="{{old('correo')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="number" min="0" class="form-control" id="telefono" name="telefono" value="{{old('telefono')}}">
          </div>
      </div>

    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>
</form>
@endsection

@section('tituloTabla')
Lista de Clientes
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cédula/RUC</th>
                <th scope="col">País</th>
                <th scope="col">Nombre</th>
                <th scope="col">Contacto</th>
                <th scope="col">Correo</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($datos as $dato )
                <tr>
                    <td>{{$dato->id}}</td>
                    <td>{{$dato->cedula}}</td>
                    <td>{{$dato->pais}}</td>
                    <td>{{$dato->nombre}}</td>
                    <td>{{$dato->contacto}}</td>
                    <td>{{$dato->correo}}</td>
                    <td>{{$dato->telefono}}</td>
                    <td>
                        <a href="{{url('clientes/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        |
                        <form action="{{url('clientes/'.$dato->id)}}" method="POST" class="delete">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit"><ion-icon name="beaker-outline"></ion-icon></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
