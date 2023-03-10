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
<form action="{{url('/soporte')}}" class="" method="post">
    @csrf

    <div class="row">
        <div class="col-md-3 d-none">
            <div class="mb-3">
                <label for="ticker" class="form-label">Ticket (Auto Generado)</label>
                <input type="number" class="form-control" min="{{$cantidad + 1}}" max="{{$cantidad + 1}}" id="ticker" name="ticker"  value="{{$cantidad + 1}}">
              </div>
          </div>

        <div class="col-md-4">
            <label for="colaborador" class="mb-2">Colaborador</label>
              <select class="form-select" name="colaborador" @error("colaborador")style="border: solid 2px red"@enderror>
                <option value="" selected disabled>Selecciona un Colaborador</option>
                <option {{ old('colaborador') == 'Roxana Baez' ? 'selected' : '' }} value="Roxana Baez">Roxana Baez</option>
                <option {{ old('colaborador') == 'Norman Logo' ? 'selected' : '' }} value="Norman Logo">Norman Logo</option>
                <option {{ old('colaborador') == 'Edwin Torres' ? 'selected' : '' }} value="Edwin Torres">Edwin Torres</option>
                <option {{ old('colaborador') == 'Jasson Ulloa' ? 'selected' : '' }} value="Jasson Ulloa">Jasson Ulloa</option>
              </select>
          </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="fechaHoraInicio" class="form-label">Fecha Inicio</label>
                <input type="datetime-local" class="form-control" id="fechaHoraInicio" name="fechaHoraInicio" value="{{old('fechaHoraInicio')}}" @error("fechaHoraInicio")style="border: solid 2px red"@enderror>
              </div>
          </div>

        {{-- <div class="col-md-4">
            <div class="mb-3">
                <label for="fechaHoraFinal" class="form-label">Fecha Final</label>
                <input type="datetime-local" class="form-control" id="fechaHoraFinal" name="fechaHoraFinal" value="{{old('fechaHoraFinal')}}" @error("fechaHoraFinal")style="border: solid 2px red"@enderror>
              </div>
          </div> --}}

          <div class="col-md-4">
            <label for="id_cliente" class="form-label">Cliente</label>
            <select class="form-select" name="id_cliente" id="id_cliente" @error("id_cliente")style="border: solid 2px red"@enderror>
              <option value="" selected disabled>Selecciona un Cliente</option>
              @foreach ($clientes as $cliente)
                <option {{ old('id_cliente') == $cliente->contacto ? 'selected' : '' }} value="{{$cliente->contacto}}">{{$cliente->contacto}}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-4">
            <label for="id_software" class="form-label">Software</label>
              <select class="form-select" name="id_software" @error("id_software")style="border: solid 2px red"@enderror>
                <option value="" selected disabled>Selecciona un Software</option>
                @foreach ($softwares as $software)
                    <option {{ old('id_software') == $software->software ? 'selected' : '' }} value="{{$software->software}}">{{$software->software}}</option>
                @endforeach
              </select>
          </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="numLaboral" class="form-label">NumLaboral</label>
                <input type="number" min="0" class="form-control" id="numLaboral" name="numLaboral" value="{{old('numLaboral')}}" @error("numLaboral")style="border: solid 2px red"@enderror>
              </div>
          </div>
          {{--  --}}
          <div class="col-md-4">
            <label for="prioridad" class="form-label">Prioridad</label>
              <select class="form-select" name="prioridad" @error("prioridad")style="border: solid 2px red"@enderror>
                  <option value="Grave" selected disabled>Selccione una prioridad</option>
                  <option {{ old('prioridad') == 'Leve' ? 'selected' : '' }} value="Leve">Leve</option>
                  <option {{ old('prioridad') == 'Moderado' ? 'selected' : '' }} value="Moderado">Moderado</option>
                  <option {{ old('prioridad') == 'Grave' ? 'selected' : '' }} value="Grave">Grave</option>
              </select>
          </div>
          
          <div class="col-md-4">
            <label for="estado" class="form-label">Estado</label>
              <select class="form-select" name="estado" @error("estado")style="border: solid 2px red"@enderror>
                  {{-- <option value="Asignado" selected disabled>Selccione un estado</option> --}}
                  <option value="Asignado">Asignado</option>
                  {{-- <option value="En Proceso">En proceso</option>
                  <option value="Completo">Completo</option> --}}
              </select>
          </div>

          {{-- <div class="col-md-4">
            <label for="usuario" class="form-label">Usuario</label>
              <select class="form-select" name="usuario" @error("usuario")style="border: solid 2px red"@enderror>
                  <option value="Asignado" selected disabled>Selccione un estado</option>
                  @foreach ($usuarioclientes as $usuariocliente)
                    <option value="{{ $usuariocliente->name }}">{{ $usuariocliente->name }}</option>  
                  @endforeach
              </select>
          </div> --}}

          <div class="col-md-4 d-none">
            <div class="mb-3">
                <label for="correo_cliente" class="form-label">Correo Cliente</label>
                <input type="text" class="form-control" id="correo_cliente" name="correo_cliente" value="{{old('correo_cliente')}}" @error("correo_cliente")style="border: solid 2px red"@enderror>
              </div>
          </div>
          {{--  --}}

          <div class="col-md-8">
            <div class="mb-3">
                <label for="problema" class="form-label">Problema</label>
                <input type="text" class="form-control" id="problema" name="problema" value="{{old('problema')}}" @error("problema")style="border: solid 2px red"@enderror>
              </div>
          </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="solucion" class="form-label">Soluci??n</label>
                <input type="text" class="form-control" id="solucion" name="solucion" value="{{old('solucion')}}" @error("solucion")style="border: solid 2px red"@enderror>
              </div>
          </div>

        <div class="col-md-6">
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
@endrole
@role('escritor')
<form action="{{url('/soporte')}}" class="" method="post">
    @csrf

    <div class="row">
        <div class="col-md-3 d-none">
            <div class="mb-3">
                <label for="ticker" class="form-label">Ticket (Auto Generado)</label>
                <input type="number" class="form-control" min="{{$cantidad + 1}}" max="{{$cantidad + 1}}" id="ticker" name="ticker"  value="{{$cantidad + 1}}">
              </div>
          </div>

        <div class="col-md-4">
            <label for="colaborador" class="mb-2">Colaborador</label>
              <select class="form-select" name="colaborador" @error("colaborador")style="border: solid 2px red"@enderror>
                <option value="" selected disabled>Selecciona un Colaborador</option>
                <option {{ old('colaborador') == 'Roxana Baez' ? 'selected' : '' }} value="Roxana Baez">Roxana Baez</option>
                <option {{ old('colaborador') == 'Norman Logo' ? 'selected' : '' }} value="Norman Logo">Norman Logo</option>
                <option {{ old('colaborador') == 'Edwin Torres' ? 'selected' : '' }} value="Edwin Torres">Edwin Torres</option>
                <option {{ old('colaborador') == 'Jasson Ulloa' ? 'selected' : '' }} value="Jasson Ulloa">Jasson Ulloa</option>
              </select>
          </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="fechaHoraInicio" class="form-label">Fecha Inicio</label>
                <input type="datetime-local" class="form-control" id="fechaHoraInicio" name="fechaHoraInicio" value="{{old('fechaHoraInicio')}}" @error("fechaHoraInicio")style="border: solid 2px red"@enderror>
              </div>
          </div>

        {{-- <div class="col-md-4">
            <div class="mb-3">
                <label for="fechaHoraFinal" class="form-label">Fecha Final</label>
                <input type="datetime-local" class="form-control" id="fechaHoraFinal" name="fechaHoraFinal" value="{{old('fechaHoraFinal')}}" @error("fechaHoraFinal")style="border: solid 2px red"@enderror>
              </div>
          </div> --}}

          <div class="col-md-4">
            <label for="id_cliente" class="form-label">Cliente</label>
            <select class="form-select" name="id_cliente" id="id_cliente" @error("id_cliente")style="border: solid 2px red"@enderror>
              <option value="" selected disabled>Selecciona un Cliente</option>
              @foreach ($clientes as $cliente)
                <option {{ old('id_cliente') == $cliente->contacto ? 'selected' : '' }} value="{{$cliente->contacto}}">{{$cliente->contacto}}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-4">
            <label for="id_software" class="form-label">Software</label>
              <select class="form-select" name="id_software" @error("id_software")style="border: solid 2px red"@enderror>
                <option value="" selected disabled>Selecciona un Software</option>
                @foreach ($softwares as $software)
                    <option {{ old('id_software') == $software->software ? 'selected' : '' }} value="{{$software->software}}">{{$software->software}}</option>
                @endforeach
              </select>
          </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="numLaboral" class="form-label">NumLaboral</label>
                <input type="number" min="0" class="form-control" id="numLaboral" name="numLaboral" value="{{old('numLaboral')}}" @error("numLaboral")style="border: solid 2px red"@enderror>
              </div>
          </div>
          {{--  --}}
          <div class="col-md-4">
            <label for="prioridad" class="form-label">Prioridad</label>
              <select class="form-select" name="prioridad" @error("prioridad")style="border: solid 2px red"@enderror>
                  <option value="Grave" selected disabled>Selccione una prioridad</option>
                  <option {{ old('prioridad') == 'Leve' ? 'selected' : '' }} value="Leve">Leve</option>
                  <option {{ old('prioridad') == 'Moderado' ? 'selected' : '' }} value="Moderado">Moderado</option>
                  <option {{ old('prioridad') == 'Grave' ? 'selected' : '' }} value="Grave">Grave</option>
              </select>
          </div>
          
          <div class="col-md-4">
            <label for="estado" class="form-label">Estado</label>
              <select class="form-select" name="estado" @error("estado")style="border: solid 2px red"@enderror>
                  {{-- <option value="Asignado" selected disabled>Selccione un estado</option> --}}
                  <option value="Asignado">Asignado</option>
                  {{-- <option value="En Proceso">En proceso</option>
                  <option value="Completo">Completo</option> --}}
              </select>
          </div>

          {{-- <div class="col-md-4">
            <label for="usuario" class="form-label">Usuario</label>
              <select class="form-select" name="usuario" @error("usuario")style="border: solid 2px red"@enderror>
                  <option value="Asignado" selected disabled>Selccione un estado</option>
                  @foreach ($usuarioclientes as $usuariocliente)
                    <option value="{{ $usuariocliente->name }}">{{ $usuariocliente->name }}</option>  
                  @endforeach
              </select>
          </div> --}}

          <div class="col-md-4 d-none">
            <div class="mb-3">
                <label for="correo_cliente" class="form-label">Correo Cliente</label>
                <input type="text" class="form-control" id="correo_cliente" name="correo_cliente" value="{{old('correo_cliente')}}" @error("correo_cliente")style="border: solid 2px red"@enderror>
              </div>
          </div>
          {{--  --}}

          <div class="col-md-8">
            <div class="mb-3">
                <label for="problema" class="form-label">Problema</label>
                <input type="text" class="form-control" id="problema" name="problema" value="{{old('problema')}}" @error("problema")style="border: solid 2px red"@enderror>
              </div>
          </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="solucion" class="form-label">Soluci??n</label>
                <input type="text" class="form-control" id="solucion" name="solucion" value="{{old('solucion')}}" @error("solucion")style="border: solid 2px red"@enderror>
              </div>
          </div>

        <div class="col-md-6">
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
@endrole
@endsection

@section('tituloTabla')
Lista de soporte

<a href="{{ route('exportar.soporte') }}" class="botnExportar">CSV</a>
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover tablagrande">
        <thead>
            <tr class="text-center">
                <th scope="col">Ticker</th>
                <th scope="col">Colaborador</th>
                <th scope="col">Fecha Inicial</th>
                <th scope="col">Fecha Final</th>
                <th scope="col">Cliente</th>
                {{-- <th scope="col">Usuario</th> --}}
                <th scope="col">Software</th>
                <th scope="col">NumLaboral</th>
                <th scope="col">Problema</th>
                <th scope="col">Prioridad</th>
                <th scope="col">Estado</th>
                <th scope="col">Soluci??n</th>
                <th scope="col">Observaciones</th>
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
                    <td>{{$dato->ticker}}</td>
                    <td>{{$dato->colaborador}}</td>
                    <td>{{$dato->fechaHoraInicio}}</td>
                    <td>{{$dato->fechaHoraFinal}}</td>
                    <td>{{$dato->id_cliente}}</td>
                    {{-- <td>{{$dato->usuario}}</td> --}}
                    <td>{{$dato->id_software}}</td>
                    <td>{{$dato->numLaboral}}</td>
                    <td>{{$dato->problema}}</td>

                    @if ($dato->prioridad == 'Leve')
                        <td style="background: #16A085;color: #D0ECE7;font-weight: bold">{{$dato->prioridad}}</td>
                    @elseif ($dato->prioridad == 'Moderado')
                        <td style="background: #E67E22;color: #FAE5D3;font-weight: bold">{{$dato->prioridad}}</td>
                    @else
                        <td style="background: #E74C3C;color: #FADBD8;font-weight: bold">{{$dato->prioridad}}</td>
                    @endif

                    @if ($dato->estado == 'Asignado')
                        <td style="background: #8a7212;color: #FCF3CF;font-weight: bold">{{$dato->estado}}</td>
                    @elseif ($dato->estado == 'En Proceso')
                        <td style="background: #3498DB;color: #D6EAF8;font-weight: bold">{{$dato->estado}}</td>
                    @else
                        <td style="background: #16A085;color: #D0ECE7;font-weight: bold">{{$dato->estado}}</td>
                    @endif
                    <td>{{$dato->solucion}}</td>
                    <td>{{$dato->observaciones}}</td>

                    @role('admin')
                    <td class="">
                        <a href="{{url('soporte/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        {{-- |
                        <form action="{{url('soporte/'.$dato->id)}}" method="POST" class="delete">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit"><ion-icon name="beaker-outline"></ion-icon></button>
                        </form> --}}
                    </td>
                    @endrole
                    @role('editor')
                    <td class="">
                        <a href="{{url('soporte/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        {{-- |
                        <form action="{{url('soporte/'.$dato->id)}}" method="POST" class="delete">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit"><ion-icon name="beaker-outline"></ion-icon></button>
                        </form> --}}
                    </td>
                    @endrole
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    const idClienteSelect = document.querySelector('#id_cliente');
    const correoClienteInput = document.querySelector('#correo_cliente');

    idClienteSelect.addEventListener('change', (event) => {
    const selectedValue = event.target.value;

    let tablaClientes = JSON.parse('{!! json_encode($clientes) !!}');
        
    tablaClientes.forEach(element => {
        let nombreCliente = element.contacto;
        let correoCliente = element.correo;

        if (nombreCliente == selectedValue) {
        correoClienteInput.value = correoCliente;
        }
    });
    });
</script>
@endsection
