@extends('home')

@section('titulo')
Expediente
@endsection

@section('tituloForm')
Agregar Expediente
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
<form action="{{url('/expedientes')}}" class="" method="post">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <label for="id_user_pertenece" class="form-label">Dueño del expediente</label>
            <select class="form-select" name="id_user_pertenece">
                <option disabled selected value="">Expediente asignado</option>
                @foreach ($soportes as $user)
                    <option {{ old('id_user_pertenece') == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="id_user_soluciona" class="form-label">Usuario asignado</label>
            <select class="form-select" name="id_user_soluciona">
                <option disabled selected value="">Asignar expediente</option>
                @foreach ($programadores as $user)
                    <option {{ old('id_user_soluciona') == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="tipo" class="form-label">Tipo</label>
            <select class="form-select" name="tipo">
                <option disabled selected value="">Asignar tipo</option>
                <option {{ old('tipo') == 'Laboratorio' ? 'selected' : '' }} value="Laboratorio">Laboratorio</option>
                <option {{ old('tipo') == 'Especialización' ? 'selected' : '' }} value="Especialización">Especialización</option>
                <option {{ old('tipo') == 'Mejora' ? 'selected' : '' }} value="Mejora">Mejora</option>
            </select>
        </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="archivo" class="form-label">File</label>
                <input type="file" class="form-control" id="archivo" name="archivo">
            </div>
        </div>

        <div class="col-md-4">
            <label for="prioridad" class="form-label">Prioridad</label>
            <select class="form-select" name="prioridad">
                <option disabled selected value="">Asignar prioridad</option>
                @foreach ($prioridades as $prioridad)
                    <option {{ old('prioridad') == $prioridad ? 'selected' : '' }} value="{{$prioridad}}">{{$prioridad}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="id_empresa" class="form-label">Empresa</label>
            <select class="form-select" name="id_empresa">
                <option disabled selected value="">Asignar empresa</option>
                @foreach ($clientes as $cliente)
                    <option {{ old('id_empresa') == $cliente->id ? 'selected' : '' }} value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="id_software" class="form-label">Sistema</label>
            <select class="form-select" name="id_software">
                <option disabled selected value="">Asignar sistema</option>
                @foreach ($softwares as $software)
                    <option {{ old('id_software') == $software->id ? 'selected' : '' }} value="{{$software->id}}">{{$software->software}}</option>
                @endforeach
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
Lista de Expediente
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Dueño del expediente</th>
                <th scope="col">Usuario asignado</th>
                <th scope="col">Empresa</th>
                <th scope="col">Sistema</th>
                <th scope="col">Expediente</th>
                <th scope="col">Estado</th>
                <th scope="col">Prioridad</th>
                <th scope="col">Entrada</th>
                <th scope="col">Programada</th>
                <th scope="col">Salida</th>
                <th scope="col">Revisión</th>
                <th scope="col">File</th>
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
                    <td>{{$dato->usuarios->name}}</td>
                    <td>{{$dato->usuarios2->name}}</td>
                    <td>{{$dato->empresas->nombre}}</td>
                    <td>{{$dato->softwares->software}}</td>
                    <td>{{$dato->expediente}}</td>
                    <td>{{$dato->estado}}</td>
                    <td>{{$dato->prioridad}}</td>
                    <td>{{$dato->fecha_entrada}}</td>
                    <td>{{$dato->fecha_programada}}</td>
                    <td>{{$dato->fecha_salida}}</td>
                    <td>{{$dato->fecha_revision}}</td>
                    <td>{{$dato->archivo}}</td>
                    {{-- <td>{{asset('storage/'.$dato->archivo)}}</td> --}}
                    <td>
                        <a href="{{url('expedientes/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
