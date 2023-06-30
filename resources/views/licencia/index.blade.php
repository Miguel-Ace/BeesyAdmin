@extends('home')

@section('titulo')
Licencias
@endsection

@section('tituloForm')
Agregar Licencias
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
<form action="{{url('/licencias')}}" class="" method="post">
    @csrf
    <div class="row">
    <div class="col-md-4">
        <label for="id_cliente" class="form-label">Cliente</label>
        <select class="form-select" name="id_cliente" @error("id_cliente") style="border: 1px solid red" @enderror>
            <option value="" selected disabled>Selecciona un cliente</option>
            @foreach ($clientes as $cliente)
                <option {{ old('id_cliente') == $cliente->nombre ? 'selected' : '' }} value="{{$cliente->nombre}}">{{$cliente->nombre}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <label for="id_software" class="form-label">Software</label>
        <select class="form-select" name="id_software" @error("id_software") style="border: 1px solid red" @enderror>
            <option value="" selected disabled>Selecciona el software</option>
            @foreach ($softwares as $software)
                <option {{ old('id_software') == $software->software ? 'selected' : '' }} value="{{$software->software}}">{{$software->software}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad Acceso</label>
            <input type="number" min="1" class="form-control" id="cantidad" name="cantidad" @error("cantidad") style="border: 1px solid red" @enderror value="{{old('cantidad')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="cantidad_usuario" class="form-label">Cantidad Usuario</label>
            <input type="number" min="1" class="form-control" id="cantidad_usuario" name="cantidad_usuario" @error("cantidad_usuario") style="border: 1px solid red" @enderror value="{{old('cantidad_usuario')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
            <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" @error("fechaInicio") style="border: 1px solid red" @enderror value="{{old('fechaInicio')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="fechaFinal" class="form-label">Fecha Final</label>
            <input type="date" class="form-control" id="fechaFinal" name="fechaFinal" @error("fechaFinal") style="border: 1px solid red" @enderror value="{{old('fechaFinal')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="ruta" class="form-label">Ruta</label>
            <input type="text" class="form-control" id="ruta" name="ruta" @error("ruta") style="border: 1px solid red" @enderror value="{{old('ruta')}}">
          </div>
      </div>
      <div class="col-md-4" style="display:flex;align-items: center">
          <label for="bee_commerce">
            <input type="checkbox" id="bee_commerce" name="bee_commerce" value="si">
            BeeCommerce
          </label>
      </div>
    </div>
    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>
</form>
@endrole
@role('escritor')
<form action="{{url('/licencias')}}" class="" method="post">
    @csrf
    <div class="row">
    <div class="col-md-4">
        <label for="id_cliente" class="form-label">Cliente</label>
        <select class="form-select" name="id_cliente" @error("id_cliente") style="border: 1px solid red" @enderror>
            <option value="" selected disabled>Selecciona un cliente</option>
            @foreach ($clientes as $cliente)
                <option {{ old('id_cliente') == $cliente->nombre ? 'selected' : '' }} value="{{$cliente->nombre}}">{{$cliente->nombre}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <label for="id_software" class="form-label">Software</label>
        <select class="form-select" name="id_software" @error("id_software") style="border: 1px solid red" @enderror>
            <option value="" selected disabled>Selecciona el software</option>
            @foreach ($softwares as $software)
                <option {{ old('id_software') == $software->software ? 'selected' : '' }} value="{{$software->software}}">{{$software->software}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad Acceso</label>
            <input type="number" min="1" class="form-control" id="cantidad" name="cantidad" @error("cantidad") style="border: 1px solid red" @enderror value="{{old('cantidad')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="cantidad_usuario" class="form-label">Cantidad Usuario</label>
            <input type="number" min="1" class="form-control" id="cantidad_usuario" name="cantidad_usuario" @error("cantidad_usuario") style="border: 1px solid red" @enderror value="{{old('cantidad_usuario')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
            <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" @error("fechaInicio") style="border: 1px solid red" @enderror value="{{old('fechaInicio')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="fechaFinal" class="form-label">Fecha Final</label>
            <input type="date" class="form-control" id="fechaFinal" name="fechaFinal" @error("fechaFinal") style="border: 1px solid red" @enderror value="{{old('fechaFinal')}}">
          </div>
      </div>
      <div class="col-md-4">
        <div class="mb-3">
            <label for="ruta" class="form-label">Ruta</label>
            <input type="text" class="form-control" id="ruta" name="ruta" @error("ruta") style="border: 1px solid red" @enderror value="{{old('ruta')}}">
          </div>
      </div>
      <div class="col-md-4" style="display:flex;align-items: center">
        <label for="bee_commerce">
          <input type="checkbox" id="bee_commerce" name="bee_commerce" value="si">
          BeeCommerce
        </label>
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
Lista de Licencias

<a href="{{ route('exportar.licencia') }}" class="botnExportar">Licencia</a>
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Cliente</th>
                <th scope="col">Software</th>
                <th scope="col">Cantidad Acceso</th>
                <th scope="col">Cantidad Usuario</th>
                <th scope="col">BeeCommerce</th>
                <th scope="col">Fecha de Inicio</th>
                <th scope="col">Fecha Final</th>
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
                    <td>{{$dato->id_cliente}}</td>
                    <td>{{$dato->id_software}}</td>
                    <td>{{$dato->cantidad}}</td>
                    <td>{{$dato->cantidad_usuario}}</td>
                    <td>{{$dato->bee_commerce}}</td>
                    <td>{{$dato->fechaInicio}}</td>
                    <td>{{$dato->fechaFinal}}</td>
                    @role('admin')
                    <td>
                        <a href="{{url('licencias/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        |
                        <form action="{{url('licencias/'.$dato->id)}}" method="POST" class="delete">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit"><ion-icon name="beaker-outline"></ion-icon></button>
                        </form>
                    </td>
                    @endrole
                    @role('editor')
                    <td>
                        <a href="{{url('licencias/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        |
                        <form action="{{url('licencias/'.$dato->id)}}" method="POST" class="delete">
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
