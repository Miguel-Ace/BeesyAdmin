@extends('home')

@section('titulo')
soporte
@endsection

@section('tituloForm')
Actualizar soporte
@endsection

@section('creacion')
<form action="{{url('soporte/'.$datos->id)}}" class="row" method="post">
    @csrf
    {{method_field('PATCH')}}
    <div class="row">
        <div class="col-md-4">
            <label for="colaborador" >Colaborador</label>
              <select class="form-select" name="colaborador">
                @if ($datos->colaborador === 'Roxana Baez')
                    <option value="Roxana Baez" selected>Roxana Baez</option>
                    <option value="Norman Logo">Norman Logo</option>
                    <option value="Edwin Torres">Edwin Torres</option>
                    <option value="Jasson Ulloa">Jasson Ulloa</option>
                @elseif ($datos->colaborador === 'Norman Logo')
                    <option value="Roxana Baez">Roxana Baez</option>
                    <option value="Norman Logo" selected>Norman Logo</option>
                    <option value="Edwin Torres">Edwin Torres</option>
                    <option value="Jasson Ulloa">Jasson Ulloa</option>

                @elseif ($datos->colaborador === 'Edwin Torres')
                    <option value="Roxana Baez">Roxana Baez</option>
                    <option value="Norman Logo">Norman Logo</option>
                    <option value="Edwin Torres" selected>Edwin Torres</option>
                    <option value="Jasson Ulloa">Jasson Ulloa</option>
                @else
                    <option value="Roxana Baez">Roxana Baez</option>
                    <option value="Norman Logo">Norman Logo</option>
                    <option value="Edwin Torres">Edwin Torres</option>
                    <option value="Jasson Ulloa" selected>Jasson Ulloa</option>
                @endif
              </select>
          </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="fechaHoraInicio" class="form-label">Fecha Inicio</label>
                <input type="datetime-local" class="form-control" id="fechaHoraInicio" name="fechaHoraInicio" value="{{$datos->fechaHoraInicio}}">
              </div>
          </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="fechaHoraFinal" class="form-label">Fecha Final</label>
                <input type="datetime-local" class="form-control" id="fechaHoraFinal" name="fechaHoraFinal" value="{{$datos->fechaHoraFinal}}">
              </div>
          </div>

        <div class="col-md-4">
            <label for="id_cliente" class="form-label">Cliente</label>
              <select class="form-select" name="id_cliente">
                @foreach ($clientes as $cliente)
                    @if ($cliente->id === $datos->clientes->id)
                    <option value="{{$cliente->id}}" selected>{{$cliente->nombre}}</option>
                    @else
                    <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                    @endif
                @endforeach
              </select>
          </div>

          <div class="col-md-4">
            <label for="id_software" class="form-label">Software</label>
              <select class="form-select" name="id_software">
                @foreach ($softwares as $software)
                    @if ($software->id === $datos->softwares->id)
                    <option value="{{$software->id}}" selected>{{$software->software}}</option>
                    @else
                    <option value="{{$software->id}}">{{$software->software}}</option>
                    @endif
                @endforeach
              </select>
          </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="numLaboral" class="form-label">NumLaboral</label>
                <input type="number" min="0" class="form-control" id="numLaboral" name="numLaboral" value="{{$datos->numLaboral}}">
              </div>
          </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="problema" class="form-label">Problema</label>
                <input type="text" class="form-control" id="problema" name="problema" value="{{$datos->problema}}">
              </div>
          </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="solucion" class="form-label">Solución</label>
                <input type="text" class="form-control" id="solucion" name="solucion" value="{{$datos->solucion}}">
              </div>
          </div>

        <div class="col-md-12">
            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <input type="text" class="form-control" id="observaciones" name="observaciones" value="{{$datos->observaciones}}">
              </div>
          </div>

    </div>

    <button type="submit" class="enviar">
      <ion-icon name="save-outline"></ion-icon>
      Guardar
    </button>

    <button class="boton regresar">
        <ion-icon name="arrow-back-outline"></ion-icon>
        <a href="{{url('/soporte')}}">Regresar</a>
      </button>
</form>
@endsection
