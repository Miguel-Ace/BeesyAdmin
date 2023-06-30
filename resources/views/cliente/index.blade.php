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

@if (session('success'))
    <div>
        <p style="background: rgb(64, 129, 64); color: white;text-align: center">{{session('success')}}</p>
    </div>
@endif

@if (session('danger'))
    <div>
        <p style="background: rgb(243, 61, 37); color: white;text-align: center">{{session('danger')}}</p>
    </div>
@endif
@role('admin')
<form action="{{url('/clientes')}}" class="row" method="post">
    @csrf
    <div class="col-md-4">
        <div class="mb-3">
            <label for="cedula" class="form-label">Identificación</label>
            <input type="text" class="form-control" id="cedula" name="cedula" @error("cedula") style="border: 1px solid red" @enderror value="{{old('cedula')}}">
          </div>
      </div>
      <div class="col-md-4">
          <label for="pais" class="form-label">País</label>
          <select class="form-select" name="pais" @error("pais") style="border: 1px solid red" @enderror>
              <option value="" selected disabled>Seleccione un País</option>
              <option {{ old('pais') == 'Guatemala' ? 'selected' : '' }} value="Guatemala">Guatemala</option>
              <option {{ old('pais') == 'El Salvador' ? 'selected' : '' }} value="El Salvador">El Salvador</option>
              <option {{ old('pais') == 'Honduras' ? 'selected' : '' }} value="Honduras">Honduras</option>
              <option {{ old('pais') == 'Nicaragua' ? 'selected' : '' }} value="Nicaragua">Nicaragua</option>
              <option {{ old('pais') == 'Costa Rica' ? 'selected' : '' }} value="Costa Rica">Costa Rica</option>
              <option {{ old('pais') == 'Panamá' ? 'selected' : '' }} value="Panamá">Panamá</option>
              <option {{ old('pais') == 'México' ? 'selected' : '' }} value="México">México</option>
            </select>
        </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" @error("nombre") style="border: 1px solid red" @enderror value="{{old('nombre')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="contacto" class="form-label">Contacto</label>
            <input type="text" class="form-control" id="contacto" name="contacto" @error("contacto") style="border: 1px solid red" @enderror value="{{old('contacto')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" @error("correo") style="border: 1px solid red" @enderror value="{{old('correo')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="number" min="0" class="form-control" id="telefono" name="telefono" @error("telefono") style="border: 1px solid red" @enderror value="{{old('telefono')}}">
          </div>
      </div>

    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>
</form>
@endrole
@role('escritor')
<form action="{{url('/clientes')}}" class="row" method="post">
    @csrf
    <div class="col-md-4">
        <div class="mb-3">
            <label for="cedula" class="form-label">Identificación</label>
            <input type="text" class="form-control" id="cedula" name="cedula" @error("cedula") style="border: 1px solid red" @enderror value="{{old('cedula')}}">
          </div>
      </div>
      <div class="col-md-4">
          <label for="pais" class="form-label">País</label>
          <select class="form-select" name="pais" @error("pais") style="border: 1px solid red" @enderror>
              <option value="" selected disabled>Seleccione un País</option>
              <option {{ old('pais') == 'Guatemala' ? 'selected' : '' }} value="Guatemala">Guatemala</option>
              <option {{ old('pais') == 'El Salvador' ? 'selected' : '' }} value="El Salvador">El Salvador</option>
              <option {{ old('pais') == 'Honduras' ? 'selected' : '' }} value="Honduras">Honduras</option>
              <option {{ old('pais') == 'Nicaragua' ? 'selected' : '' }} value="Nicaragua">Nicaragua</option>
              <option {{ old('pais') == 'Costa Rica' ? 'selected' : '' }} value="Costa Rica">Costa Rica</option>
              <option {{ old('pais') == 'Panamá' ? 'selected' : '' }} value="Panamá">Panamá</option>
              <option {{ old('pais') == 'México' ? 'selected' : '' }} value="México">México</option>
            </select>
        </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" @error("nombre") style="border: 1px solid red" @enderror value="{{old('nombre')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="contacto" class="form-label">Contacto</label>
            <input type="text" class="form-control" id="contacto" name="contacto" @error("contacto") style="border: 1px solid red" @enderror value="{{old('contacto')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" @error("correo") style="border: 1px solid red" @enderror value="{{old('correo')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="number" min="0" class="form-control" id="telefono" name="telefono" @error("telefono") style="border: 1px solid red" @enderror value="{{old('telefono')}}">
          </div>
      </div>

    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>
</form>
@endrole
@endsection

@section('tituloTabla')
Lista de Clientes
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover grande">
        <thead>
            <tr class="text-center">
                {{-- <th scope="col">#</th> --}}
                <th scope="col">Cédula/RUC</th>
                <th scope="col">País</th>
                <th scope="col">Nombre</th>
                <th scope="col">Contacto</th>
                <th scope="col">Correo</th>
                <th scope="col">Teléfono</th>
                @role('admin')
                <th scope="col">Acciones</th>
                @endrole
                @role('editor')
                <th scope="col">Acciones</th>
                @endrole
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($datos as $dato )
                <tr>
                    {{-- <td>{{$dato->id}}</td> --}}
                    <td>{{$dato->cedula}}</td>
                    <td>{{$dato->pais}}</td>
                    <td>{{$dato->nombre}}</td>
                    <td>{{$dato->contacto}}</td>
                    <td>{{$dato->correo}}</td>
                    <td>{{$dato->telefono}}</td>
                    @role('admin')
                    <td>
                        <a href="{{url('user_cliente?buscar='.$dato->id)}}" class="show"><ion-icon name="add-outline"></ion-icon></a>
                        |
                        <a href="{{url('clientes/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        |
                        <form action="{{url('clientes/'.$dato->id)}}" method="POST" class="delete">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit"><ion-icon name="beaker-outline"></ion-icon></button>
                        </form>
                    </td>
                    @endrole
                    @role('editor')
                    <td>
                        <a href="{{url('user_cliente?buscar='.$dato->id)}}" class="show"><ion-icon name="add-outline"></ion-icon></a>
                        |
                        <a href="{{url('clientes/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        |
                        <form action="{{url('clientes/'.$dato->id)}}" method="POST" class="delete">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit"><ion-icon name="beaker-outline"></ion-icon></button>
                        </form>
                    </td>
                    @endrole
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
