@extends('home')

@section('titulo')
Software
@endsection

@section('tituloForm')
Agregar Software
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

<form action="{{url('/software')}}" class="row btnAbajo" method="post">
    @csrf
    <div class="col-md-4 row">
        <div class="mb-3 col-12">
            <label for="software" class="form-label">Software</label>
            <input type="text" class="form-control" id="software" name="software" @error("software") style="border: 1px solid red" @enderror>
        </div>
    </div>
    
    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>
</form>
@endsection

@section('tituloTabla')
Lista de Software
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Software</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($datos as $dato )
                <tr>
                    <td>{{$dato->id}}</td>
                    <td>{{$dato->software}}</td>
                    <td>
                        <a href="{{url('software/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        |
                        <form action="{{url('software/'.$dato->id)}}" method="POST" class="delete">
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
