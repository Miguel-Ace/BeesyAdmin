@extends('home')

@section('titulo')
Proyecto
@endsection

@section('tituloForm')
Actualizar Proyecto
@endsection

@section('creacion')
<form action="{{url('proyectos/'.$datos->id)}}" class="row" method="post">
    @csrf
    {{method_field('PATCH')}}
    <div class="row">
        <div class="col-md-3">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$datos->nombre}}">
              </div>
          </div>

          <div class="col-md-3">
            <label for="id_cliente" class="form-label">Cliente</label>
              <select class="form-select" name="id_cliente">
                @foreach ($clientes as $cliente)
                    @if ($cliente->id == $datos->cliente)
                        <option value="{{$cliente->nombre}}" selected>{{$cliente->nombre}}</option>
                    @else
                        <option value="{{$cliente->nombre}}">{{$cliente->nombre}}</option>
                    @endif
                @endforeach
              </select>
          </div>

          <div class="col-md-3">
            <label for="user_de_cliente" class="form-label">Usuario del Cliente</label>
            <select class="form-select" name="user_de_cliente" @error("user_de_cliente")style="border: solid 2px red"@enderror>
                <option value="">Selecciona usuario del cliente</option>
                @foreach ($userdeclientes as $userdecliente)
                  @if ($userdecliente->name == $datos->user_de_cliente)
                      <option value="{{$userdecliente->name}}" selected>{{$userdecliente->name}}</option>
                    @else
                      <option value="{{$userdecliente->name}}">{{$userdecliente->name}}</option>
                  @endif
                @endforeach
            </select>
        </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="responsable_cliente" class="form-label">Responsable del Cliente</label>
                <input type="text" class="form-control" id="responsable_cliente" name="responsable_cliente" value="{{$datos->responsable_cliente}}">
              </div>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="email_responsable" class="form-label">Email del Responsable</label>
                <input type="email" class="form-control" id="email_responsable" name="email_responsable" value="{{$datos->email_responsable}}">
              </div>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
                <label for="telefono_responsable" class="form-label">Teléfono del Responsable</label>
                <input type="number" class="form-control" id="telefono_responsable" name="telefono_responsable" value="{{$datos->telefono_responsable}}">
              </div>
          </div>

          <div class="col-md-3">
            <label for="id_usuario" class="form-label">Usuario</label>
              <select class="form-select" name="id_usuario">
                @foreach ($usuarios as $usuario)
                    <option value="{{$usuario->name}}">{{$usuario->name}}</option>
                @endforeach
              </select>
          </div>

        <div class="col-md-3">
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
                <input type="datetime-local" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{$datos->fecha_inicio}}">
              </div>
          </div>

        <div class="col-md-3">
            <div class="mb-3">
                <label for="fecha_fin" class="form-label">Fecha Final</label>
                <input type="datetime-local" class="form-control" id="fecha_fin" name="fecha_fin" value="{{$datos->fecha_fin}}">
            </div>
        </div>
    </div>

    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>

    <a href="{{url('/proyectos')}}" class="boton regresar"><ion-icon name="arrow-back-outline"></ion-icon>Regresar</a>
</form>
@endsection
