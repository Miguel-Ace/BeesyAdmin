@extends('home')

@section('titulo')
soporte
@endsection

@section('tituloForm')
Agregar soporte
@endsection

@section('creacion')
@if ($errors->any())
    <ul class="bg-white text-danger p-2">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="{{url('/soporte')}}" class="" method="post">
    @csrf

    <div class="row">
        <div class="col-md-3">
            <div class="mb-3">
                <label for="sticker" class="form-label">Sticker(Auto Generado)</label>
                <input type="number" class="form-control" min="{{$cantidad + 1}}" max="{{$cantidad + 1}}" id="sticker" name="sticker"  value="{{$cantidad + 1}}">
              </div>
          </div>

        <div class="col-md-3">
            <label for="colaborador" class="mb-2">Colaborador</label>
              <select class="form-select" name="colaborador">
                <option value="Roxana Baez">Roxana Baez</option>
                <option value="Norman Logo">Norman Logo</option>
                <option value="Edwin Torres">Edwin Torres</option>
                <option value="Jasson Ulloa">Jasson Ulloa</option>
              </select>
          </div>

        <div class="col-md-3">
            <div class="mb-3">
                <label for="fechaHoraInicio" class="form-label">Fecha Inicio</label>
                <input type="datetime-local" class="form-control" id="fechaHoraInicio" name="fechaHoraInicio" value="{{old('fechaHoraInicio')}}">
              </div>
          </div>

        <div class="col-md-3">
            <div class="mb-3">
                <label for="fechaHoraFinal" class="form-label">Fecha Final</label>
                <input type="datetime-local" class="form-control" id="fechaHoraFinal" name="fechaHoraFinal" value="{{old('fechaHoraFinal')}}">
              </div>
          </div>

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
                <label for="numLaboral" class="form-label">NumLaboral</label>
                <input type="number" min="0" class="form-control" id="numLaboral" name="numLaboral" value="{{old('numLaboral')}}">
              </div>
          </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="problema" class="form-label">Problema</label>
                <input type="text" class="form-control" id="problema" name="problema" value="{{old('problema')}}">
              </div>
          </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="solucion" class="form-label">Solución</label>
                <input type="text" class="form-control" id="solucion" name="solucion" value="{{old('solucion')}}">
              </div>
          </div>

        <div class="col-md-12">
            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <input type="text" class="form-control" id="observaciones" name="observaciones" value="{{old('observaciones')}}">
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
Lista de soporte
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">Sticker</th>
                <th scope="col">Colaborador</th>
                <th scope="col">Fecha Inicial</th>
                <th scope="col">Fecha Final</th>
                <th scope="col">Cliente</th>
                <th scope="col">Software</th>
                <th scope="col">Problema</th>
                <th scope="col">Soluciòn</th>
                <th scope="col">NumLaboral</th>
                <th scope="col">Observaciones</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($datos as $dato )
                <tr>
                    <td>{{$dato->sticker}}</td>
                    <td>{{$dato->colaborador}}</td>
                    <td>{{$dato->fechaHoraInicio}}</td>
                    <td>{{$dato->fechaHoraFinal}}</td>
                    <td>{{$dato->clientes->nombre}}</td>
                    <td>{{$dato->softwares->software}}</td>
                    <td>{{$dato->problema}}</td>
                    <td>{{$dato->solucion}}</td>
                    <td>{{$dato->numLaboral}}</td>
                    <td>{{$dato->observaciones}}</td>
                    <td class="">
                        <a href="{{url('soporte/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        {{-- |
                        <form action="{{url('soporte/'.$dato->id)}}" method="POST" class="delete">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit"><ion-icon name="beaker-outline"></ion-icon></button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
