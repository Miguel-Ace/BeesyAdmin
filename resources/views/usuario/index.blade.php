@extends('home')

@section('titulo')
Usuarios
@endsection

{{-- @role('admin') --}}
@section('tituloForm')
Registra Usuario
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

@if (auth()->user()->id == 1)
<form action="{{url('/usuarios')}}" class="row" method="post">
    @csrf
    <div class="col-md-4">
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" @error("name") style="border: 1px solid red" @enderror value="{{old('name')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="email" class="form-label">Correo</label>
            <input type="email" class="form-control" id="email" name="email" @error("email") style="border: 1px solid red" @enderror value="{{old('email')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="text" class="form-control" id="password" name="password" @error("password") style="border: 1px solid red" @enderror value="{{ $random }}">
          </div>
      </div>

    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>

    <a href="{{url('/assign')}}" class="boton regresar"><ion-icon name="create-outline"></ion-icon>Rol User</a>
</form>
@else
@role('escritor')
<form action="{{url('/usuarios')}}" class="row" method="post">
    @csrf
    <div class="col-md-4">
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" @error("name") style="border: 1px solid red" @enderror value="{{old('name')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="email" class="form-label">Correo</label>
            <input type="email" class="form-control" id="email" name="email" @error("email") style="border: 1px solid red" @enderror value="{{old('email')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="text" class="form-control" id="password" name="password" @error("password") style="border: 1px solid red" @enderror value="{{ $random }}">
          </div>
      </div>

    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>

    <a href="{{url('/assign')}}" class="boton regresar"><ion-icon name="create-outline"></ion-icon>Rol User</a>
</form>
@endrole

@role('admin')
<form action="{{url('/usuarios')}}" class="row" method="post">
    @csrf
    <div class="col-md-4">
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" @error("name") style="border: 1px solid red" @enderror value="{{old('name')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="email" class="form-label">Correo</label>
            <input type="email" class="form-control" id="email" name="email" @error("email") style="border: 1px solid red" @enderror value="{{old('email')}}">
          </div>
      </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="text" class="form-control" id="password" name="password" @error("password") style="border: 1px solid red" @enderror value="{{ $random }}">
          </div>
      </div>

    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>

    <a href="{{url('/assign')}}" class="boton regresar"><ion-icon name="create-outline"></ion-icon>Rol User</a>
</form>
@endrole
@endif

@endsection

@section('tituloTabla')
Lista de usuarios
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">Email</th>
                {{-- <th scope="col">Contraseña</th> --}}
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
                    <td>{{$dato->name}}</td>
                    <td>{{$dato->email}}</td>
                    {{-- <td>{{$dato->password}}</td> --}}
                    @role('admin')
                    <td>
                        <a href="{{url('usuarios/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        |
                        <form action="{{url('usuarios/'.$dato->id)}}" method="POST" class="delete">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit"><ion-icon name="beaker-outline"></ion-icon></button>
                        </form>
                    </td>
                    @endrole
                    @role('editor')
                    <td>
                        <a href="{{url('usuarios/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        |
                        <form action="{{url('usuarios/'.$dato->id)}}" method="POST" class="delete">
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
{{-- @endrole --}}