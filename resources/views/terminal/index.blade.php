@extends('home')

@section('titulo')
Terminales
@endsection

@section('tituloForm')
Agregar Terminal
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
<form action="{{url('/terminales')}}" class="" method="post">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <label for="id_licencia" class="form-label">Licencia</label>
            <select class="form-select" name="id_licencia">
                <option value="" selected disabled>Seleccione Licencia</option>
                @foreach ($clientes as $cliente)
                    <option {{ old('id_licencia') == $cliente->nombre ? 'selected' : '' }} value="{{$cliente->nombre}}">{{$cliente->nombre}}</option>
                @endforeach
            </select>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
                <label for="serial" class="form-label">Serial</label>
                <input type="number" min="0" class="form-control" id="serial" name="serial" value="{{old('serial')}}">
              </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
                <label for="nombreEquipo" class="form-label">Nombre Equipo</label>
                <input type="text" min="0" class="form-control" id="nombreEquipo" name="nombreEquipo" value="{{old('nombreEquipo')}}">
              </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
                <label for="ultimoAcceso" class="form-label">Último Acceso</label>
                <input type="date" min="0" class="form-control" id="ultimoAcceso" name="ultimoAcceso" value="{{old('ultimoAcceso')}}">
              </div>
          </div>
          <div class="col-md-4">
            <label for="ultimoAcceso" class="form-label">Estado</label>
            <select class="form-select" name="estado">
                <option {{ old('estado') == 'activo' ? 'selected' : '' }} value="activo">Activo</option>
                <option {{ old('estado') == 'inactivo' ? 'selected' : '' }} value="inactivo">Inactivo</option>
            </select>
          </div>
    </div>
    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>
</form>
@endrole
@role('escritor')
<form action="{{url('/terminales')}}" class="" method="post">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <label for="id_licencia" class="form-label">Licencia</label>
            <select class="form-select" name="id_licencia">
                <option value="" selected disabled>Seleccione Licencia</option>
                @foreach ($clientes as $cliente)
                    <option {{ old('id_licencia') == $cliente->nombre ? 'selected' : '' }} value="{{$cliente->nombre}}">{{$cliente->nombre}}</option>
                @endforeach
            </select>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
                <label for="serial" class="form-label">Serial</label>
                <input type="number" min="0" class="form-control" id="serial" name="serial" value="{{old('serial')}}">
              </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
                <label for="nombreEquipo" class="form-label">Nombre Equipo</label>
                <input type="text" min="0" class="form-control" id="nombreEquipo" name="nombreEquipo" value="{{old('nombreEquipo')}}">
              </div>
          </div>
          <div class="col-md-4">
            <div class="mb-3">
                <label for="ultimoAcceso" class="form-label">Último Acceso</label>
                <input type="date" min="0" class="form-control" id="ultimoAcceso" name="ultimoAcceso" value="{{old('ultimoAcceso')}}">
              </div>
          </div>
          <div class="col-md-4">
            <label for="ultimoAcceso" class="form-label">Estado</label>
            <select class="form-select" name="estado">
                <option {{ old('estado') == 'activo' ? 'selected' : '' }} value="activo">Activo</option>
                <option {{ old('estado') == 'inactivo' ? 'selected' : '' }} value="inactivo">Inactivo</option>
            </select>
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
Lista de Terminal
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Nombre Equipo</th>
                <th scope="col">Serial</th>
                <th scope="col">Licencia</th>
                <th scope="col">Ultimo Acceso</th>
                <th scope="col">Estado</th>
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
                    <td>{{$dato->id}}</td>
                    <td>{{$dato->nombreEquipo}}</td>
                    <td>{{$dato->serial}}</td>
                    <td>{{$dato->id_licencia}}</td>
                    <td>{{$dato->ultimoAcceso}}</td>
                    @if ($dato->estado === 'activo')
                        <td class="bg-green-100 text-green-800 text-x font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">{{$dato->estado}}</td>
                    @else
                        <td class="bg-green-100 text-red-800 text-x font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">{{$dato->estado}}</td>
                    @endif

                    <td>
                        <a href="{{url('terminales/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        |
                        <form action="{{url('terminales/'.$dato->id)}}" method="POST" class="delete">
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
