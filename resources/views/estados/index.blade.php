@extends('home')

@section('titulo')
Estado
@endsection

@section('tituloForm')
Agregar Estado
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
<form action="{{url('/estados')}}" class="row btnAbajo" method="post">
    @csrf
    <div class="col-md-4 row">
        <div class="mb-3 col-12">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado">
          </div>
      </div>
    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>
</form>
@endrole
@role('escritor')
<form action="{{url('/estados')}}" class="row btnAbajo" method="post">
    @csrf
    <div class="col-md-4 row">
        <div class="mb-3 col-12">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado">
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
Lista de Estado
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
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
                    <td>{{$dato->estado}}</td>
                    @role('admin')
                    <td>
                        <a href="{{url('estados/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        |
                        <form action="{{url('estados/'.$dato->id)}}" method="POST" class="delete">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit"><ion-icon name="beaker-outline"></ion-icon></button>
                        </form>
                    </td>
                    @endrole
                    @role('editor')
                    <td>
                        <a href="{{url('estados/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        |
                        <form action="{{url('estados/'.$dato->id)}}" method="POST" class="delete">
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
