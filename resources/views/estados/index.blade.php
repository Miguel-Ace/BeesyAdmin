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
<form action="{{url('/estados')}}" class="row" method="post">
    @csrf
    <div class="col-md-12 row">
        <div class="mb-3 col-4">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado">
          </div>
      </div>
    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>
</form>
@endsection

@section('tituloTabla')
Lista de Estado
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($datos as $dato )
                <tr>
                    <td>{{$dato->id}}</td>
                    <td>{{$dato->estado}}</td>
                    <td>
                        <a href="{{url('estados/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        |
                        <form action="{{url('estados/'.$dato->id)}}" method="POST" class="delete">
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
