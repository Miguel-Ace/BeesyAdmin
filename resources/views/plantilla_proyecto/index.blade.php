@extends('home')

@section('titulo')
Plantilla Proyecto
@endsection

@section('tituloForm')
Agregar Plantilla Proyecto
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


<form action="{{url('/plantilla_proyectos')}}" class="" method="post">
    @csrf

    <div class="row">
        {{-- <div class="col-md-3">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" @error("nombre") style="border: 1px solid red" @enderror value="{{old('nombre')}}">
              </div>
          </div> --}}

          {{-- <div class="col-md-3">
            <label for="id_cliente" class="form-label">Cliente</label>
              <select class="form-select" name="id_cliente">
                <option value="">Selecciona un cliente</option>
                @foreach ($clientes as $cliente)
                    @foreach ($datos as $dato)
                        @if ($cliente->id == $dato->id_cliente)
                        {{$valor = $cliente->id}}
                        @endif
                    @endforeach

                    @if ($valor !== $cliente->id)
                        <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                    @else
                        <option value="">{{$cliente->nombre}} - ya utilzado</option>
                    @endif
                @endforeach
              </select>
          </div> --}}

          {{-- <div class="col-md-3">
            <div class="mb-3">
                <label for="responsable_cliente" class="form-label">Responsable del Cliente</label>
                <input type="text" class="form-control" id="responsable_cliente" name="responsable_cliente" @error("responsable_cliente") style="border: 1px solid red" @enderror value="{{old('responsable_cliente')}}">
              </div>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="email_responsable" class="form-label">Email del Responsable</label>
                <input type="email" class="form-control" id="email_responsable" name="email_responsable" @error("email_responsable") style="border: 1px solid red" @enderror value="{{old('email_responsable')}}">
              </div>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="telefono_responsable" class="form-label">Teléfono del Responsable</label>
                <input type="number" class="form-control" id="telefono_responsable" name="telefono_responsable" @error("select_plantilla") style="border: 1px solid red" @enderror value="{{old('telefono_responsable')}}">
              </div>
          </div> --}}

          {{-- <div class="col-md-3">
            <label for="id_usuario" class="form-label">Usuario</label>
              <select class="form-select" name="id_usuario">
                <option value="">Selecciona un usuario</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{$usuario->id}}">{{$usuario->nombre}}</option>
                @endforeach
              </select>
          </div> --}}

        {{-- <div class="col-md-3">
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
                <input type="datetime-local" class="form-control" id="fecha_inicio" name="fecha_inicio" @error("fecha_inicio") style="border: 1px solid red" @enderror value="{{old('fecha_inicio')}}">
              </div>
          </div>

        <div class="col-md-3">
            <div class="mb-3">
                <label for="fecha_fin" class="form-label">Fecha Final</label>
                <input type="datetime-local" class="form-control" id="fecha_fin" name="fecha_fin" @error("fecha_fin") style="border: 1px solid red" @enderror value="{{old('fecha_fin')}}">
            </div>
        </div> --}}

        <div class="col-md-3">
            <div class="mb-3">
                <label for="select_plantilla" class="form-label">Nombre su plantilla</label>
                <input type="text" class="form-control" id="select_plantilla" name="select_plantilla" @error("select_plantilla") style="border: 1px solid red" @enderror value="{{old('select_plantilla')}}">
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
Plantillas Creadas

<form action="{{url('/plantilla_proyectos')}}" method="get" class="formularioBuscador d-none">
    <input type="text" name="buscar" id="buscar" placeholder="Buscar" value="{{$busqueda}}">
    <input type="submit" value="Buscar">
</form>
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">Nombre de Plantilla</th>
                {{-- <th scope="col">Nombre</th> --}}
                {{-- <th scope="col">Cliente</th> --}}
                {{-- <th scope="col">Responsable Cliente</th> --}}
                {{-- <th scope="col">Email Responsable</th> --}}
                {{-- <th scope="col">Teléfono Responsable</th> --}}
                {{-- <th scope="col">Usuario</th> --}}
                {{-- <th scope="col">Fecha Inicio</th> --}}
                {{-- <th scope="col">Fecha Final</th> --}}
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($datos as $dato )

                @if ($dato->id_cliente == "" && $dato->id_usuario == "")
                    <tr>
                        <td>{{$dato->select_plantilla}}</td>
                        {{-- <td>{{$dato->nombre}}</td>
                            @if ($dato->id_cliente)
                                <td>{{$dato->clientes->nombre}}</td>
                            @endif
                        <td>{{$dato->responsable_cliente}}</td>
                        <td>{{$dato->email_responsable}}</td>
                        <td>{{$dato->telefono_responsable}}</td>
                            @if ($dato->id_usuario)
                                <td>{{$dato->usuarios->nombre}}</td>
                            @endif
                        <td>{{$dato->fecha_inicio}}</td>
                        <td>{{$dato->fecha_fin}}</td> --}}
                        <td class="">
                            <a href="{{url('/plantilla_detalle_proyectos?buscar='.$dato->id)}}" class="show"><ion-icon name="add-circle-outline"></ion-icon></a>
                            |
                            <a href="{{url('plantilla_proyectos/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                            |
                            <form action="{{url('proyectos/'.$dato->id)}}" method="POST" class="delete">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit"><ion-icon name="beaker-outline"></ion-icon></button>
                            </form>
                        </td>
                    </tr>
                @endif

            @endforeach
        </tbody>
    </table>
</div>

@endsection
