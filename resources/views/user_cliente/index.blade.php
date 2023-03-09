@extends('home')

@section('titulo')
Usuarios Cliente
@endsection

{{-- @role('admin') --}}
@section('tituloForm')
Registra Usuario Del CLiente:
@foreach ($clientes as $cliente)
@if ($cliente->id == $obtenerId)
        <span style="color: green; margin-left: 6px; font-weight: bold">{{ $valornombre = $cliente->nombre }}</span>
@endif
@endforeach

<form action="{{url('/user_cliente')}}" method="get" class="formularioBuscador d-none">
    <input type="text" name="buscar" id="buscar" placeholder="Buscar" value="{{$busqueda}}">
    <input type="submit" value="Buscar">
</form>
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
<form action="{{url('/user_cliente'.'/'.$obtenerId)}}" class="row" method="post">
    @csrf
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" @error("name") style="border: 1px solid red" @enderror value="{{old('name')}}">
          </div>
      </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="email" class="form-label">Correo</label>
            <input type="email" class="form-control" id="email" name="email" @error("email") style="border: 1px solid red" @enderror value="{{old('email')}}">
          </div>
      </div>
    <div class="col-md-4 d-none">
        <div class="mb-3">
            <label for="cliente" class="form-label">Cliente</label>
            <input type="number" class="form-control" id="cliente" name="cliente" @error("cliente") style="border: 1px solid red" @enderror value="{{ $obtenerId }}">
          </div>
      </div>

    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>

    <a href="{{ url('/clientes') }}" class="regresar"><ion-icon name="arrow-back-outline"></ion-icon>Regresar</a>
</form>
@endrole
@role('escritor')
<form action="{{url('/user_cliente'.'/'.$obtenerId)}}" class="row" method="post">
    @csrf
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" @error("name") style="border: 1px solid red" @enderror value="{{old('name')}}">
          </div>
      </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="email" class="form-label">Correo</label>
            <input type="email" class="form-control" id="email" name="email" @error("email") style="border: 1px solid red" @enderror value="{{old('email')}}">
          </div>
      </div>
    <div class="col-md-4 d-none">
        <div class="mb-3">
            <label for="cliente" class="form-label">Cliente</label>
            <input type="number" class="form-control" id="cliente" name="cliente" @error("cliente") style="border: 1px solid red" @enderror value="{{ $obtenerId }}">
          </div>
      </div>

    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>

    <a href="{{ url('/clientes') }}" class="regresar"><ion-icon name="arrow-back-outline"></ion-icon>Regresar</a>
</form>
@endrole
@endsection

@section('tituloTabla')
Lista de usuarios
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                {{-- <th scope="col">#</th> --}}
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Cliente</th>
                @role('admin')
                <th scope="col">Acciones</th>
                @endrole
                @role('editor')
                <th scope="col">Acciones</th>
                @endrole
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($userclientes as $dato )
                @foreach ($clientes as $cliente)
                    @if ($cliente->id == $obtenerId)
                            <span class="d-none">{{ $valor = $cliente->id }} {{ $valornombre = $cliente->nombre }}</span>
                    @endif
                @endforeach

                @if ($dato->cliente == $valor)
                    <tr>
                        {{-- <td>{{$dato->id}}</td> --}}
                        <td>{{$dato->name}}</td>
                        <td>{{$dato->email}}</td>
                        <td>{{$valornombre}}</td>
                        @role('admin')
                        <td>
                            <a href="{{url('user_cliente/'.$dato->id.'/edit'.'/'.$obtenerId)}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                            |
                            <form action="{{url('user_cliente/'.$dato->id)}}" method="POST" class="delete">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit"><ion-icon name="beaker-outline"></ion-icon></button>
                            </form>
                        </td>
                        @endrole
                        @role('editor')
                        <td>
                            <a href="{{url('user_cliente/'.$dato->id.'/edit'.'/'.$obtenerId)}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                            |
                            <form action="{{url('user_cliente/'.$dato->id)}}" method="POST" class="delete">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit"><ion-icon name="beaker-outline"></ion-icon></button>
                            </form>
                        </td>
                        @endrole
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

@endsection
{{-- @endrole --}}