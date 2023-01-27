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
<form action="{{url('/licencias')}}" class="" method="post">
    @csrf
    <div class="row">
    <div class="col-md-4">
        <label for="id_cliente" class="form-label">Cliente</label>
        <select class="form-select" name="id_cliente">
            @foreach ($clientes as $cliente)
                <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
            @endforeach
        </select>
      </div>
    <div class="col-md-4">
        <label for="id_software" class="form-label">Software</label>
        <select class="form-select" name="id_software">
            @foreach ($softwares as $software)
                <option value="{{$software->id}}">{{$software->software}}</option>
            @endforeach
        </select>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" min="1" class="form-control" id="cantidad" name="cantidad" value="{{old('cantidad')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
            <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" value="{{old('fechaInicio')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="fechaFinal" class="form-label">Fecha Final</label>
            <input type="date" class="form-control" id="fechaFinal" name="fechaFinal" value="{{old('fechaFinal')}}">
          </div>
      </div>
    </div>
    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>
</form>
@endsection

@section('tituloTabla')
Lista de Licencias
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cliente</th>
                <th scope="col">Software</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Fecha de Inicio</th>
                <th scope="col">Fecha Final</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($datos as $dato )
                <tr>
                    <td>{{$dato->id}}</td>
                    <td>{{$dato->clientes->nombre}}</td>
                    <td>{{$dato->softwares->software}}</td>
                    <td>{{$dato->cantidad}}</td>
                    <td>{{$dato->fechaInicio}}</td>
                    <td>{{$dato->fechaFinal}}</td>
                    <td>
                        <a href="{{url('licencias/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        |
                        <form action="{{url('licencias/'.$dato->id)}}" method="POST" class="delete">
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
