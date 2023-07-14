@extends('home')
@vite(['resources/js/filtro.js'])
@section('titulo')
soporte
@endsection

@section('tituloForm')
{{-- @role('admin')
@endrole --}}
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

<form action="{{url('/soporte')}}" class="" method="post" enctype="multipart/form-data">
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
                <option {{ old('colaborador') == 'José Rizo' ? 'selected' : '' }} value="José Rizo">José Rizo</option>
                <option {{ old('colaborador') == 'Kenneth Granados' ? 'selected' : '' }} value="Kenneth Granados">Kenneth Granados</option>
                <option {{ old('colaborador') == 'Ramses Rivas' ? 'selected' : '' }} value="Ramses Rivas">Ramses Rivas</option>
                <option {{ old('colaborador') == 'Mauro Pettyn' ? 'selected' : '' }} value="Mauro Pettyn">Mauro Pettyn</option>
                <option {{ old('colaborador') == 'Deyna López' ? 'selected' : '' }} value="Deyna López">Deyna López</option>
              </select>
          </div>

          <div class="col-md-4 d-none">
            <div class="mb-3">
                <label for="fechaInicioAsistencia" class="form-label">Fecha y hora de inicio de asistencia</label>
                <input type="datetime-local" class="form-control" id="fechaInicioAsistencia" name="fechaInicioAsistencia" value="{{old('fechaInicioAsistencia')}}" @error("fechaInicioAsistencia")style="border: solid 2px red"@enderror>
            </div>
          </div>

        <div class="col-md-4 d-none">
            <div class="mb-3">
                <label for="fechaFinalAsistencia" class="form-label">fecha y hora final de asistencia</label>
                <input type="datetime-local" class="form-control" id="fechaFinalAsistencia" name="fechaFinalAsistencia" value="{{old('fechaFinalAsistencia')}}" @error("fechaFinalAsistencia")style="border: solid 2px red"@enderror>
              </div>
          </div>

        <div class="col-md-4 d-none">
            <div class="mb-3">
                <label for="fechaCreacionTicke" class="form-label">Fecha Creación de Ticket</label>
                <input type="datetime-local" class="form-control" id="fechaCreacionTicke" name="fechaCreacionTicke" value="{{date('Y-m-d H:i')}}" @error("fechaCreacionTicke")style="border: solid 2px red"@enderror>
              </div>
          </div>

        <div class="col-md-4 d-none">
            <div class="mb-3">
                <label for="empresa" class="form-label">Empresa</label>
                <input type="text" class="form-control" id="empresa" name="empresa" value="{{old('empresa')}}" @error("empresa")style="border: solid 2px red"@enderror>
              </div>
          </div>

          <div class="col-md-4 mb-3">
            <label for="id_cliente" class="form-label">Cliente</label>
            <select class="form-select" name="id_cliente" id="id_cliente" @error("id_cliente")style="border: solid 2px red"@enderror>
              <option value="" selected disabled>Selecciona un Cliente</option>
              @foreach ($clientes->sortBy('contacto') as $cliente)
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

        <div class="col-md-4 d-none">
            <div class="mb-3">
                <label for="numLaboral" class="form-label">NumLaboral</label>
                <input type="number" min="0" class="form-control" id="numLaboral" name="numLaboral" value="{{$cantidad + 1}}">
              </div>
          </div>
          {{--  --}}
          <div class="col-md-4">
            <label for="prioridad" class="form-label">Prioridad</label>
              <select class="form-select" name="prioridad" @error("prioridad")style="border: solid 2px red"@enderror>
                  <option value="Grave" selected disabled>Selccione una prioridad</option>
                  <option {{ old('prioridad') == 'Leve' ? 'selected' : '' }} value="Leve">Leve</option>
                  <option {{ old('prioridad') == 'Moderado' ? 'selected' : '' }} value="Moderado">Moderado</option>
                  <option {{ old('prioridad') == 'Alta' ? 'selected' : '' }} value="Alta">Alta</option>
              </select>
          </div>

          <div class="col-md-4 d-none">
            <label for="estado" class="form-label">Estado</label>
              <select class="form-select" name="estado" @error("estado")style="border: solid 2px red"@enderror>
                  {{-- <option value="Asignado" selected disabled>Selccione un estado</option> --}}
                  <option value="Asignado">Asignado</option>
                  {{-- <option value="En Proceso">En proceso</option>
                  <option value="Completo">Completo</option> --}}
              </select>
          </div>

          <div class="col-md-4">
            <div class="mb-3">
                <label for="archivo" class="form-label">Imagen o Documento</label>
                <input type="file" class="form-control" id="archivo" name="archivo">
              </div>
          </div>
          
          <div class="col-md-4">
              <label for="origen_asistencia" class="form-label">Origen Asistencia</label>
              <select class="form-select" name="origen_asistencia" @error("origen_asistencia")style="border: solid 2px red"@enderror>
                  <option value="Grave" selected disabled>Origen Asistencia</option>
                  <option {{ old('origen_asistencia') == 'Error de usuario' ? 'selected' : '' }} value="Error de usuario">Error de usuario</option>
                  <option {{ old('origen_asistencia') == 'Error de software' ? 'selected' : '' }} value="Error de software">Error de software</option>
              </select>
          </div>
          
          <div class="col-md-4">
            <div class="mb-3">
                <label for="fecha_prevista_cumplimiento" class="form-label">Fecha Prevista Cumplimiento</label>
                <input type="datetime-local" class="form-control" id="fecha_prevista_cumplimiento" name="fecha_prevista_cumplimiento" value="{{old('fecha_prevista_cumplimiento')}}" @error("fecha_prevista_cumplimiento")style="border: solid 2px red"@enderror>
            </div>
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

        {{-- <div class="col-md-6">
            <div class="mb-3">
                <label for="solucion" class="form-label">Solución</label>
                <input type="text" class="form-control" id="solucion" name="solucion" value="{{old('solucion')}}" @error("solucion")style="border: solid 2px red"@enderror>
              </div>
          </div> --}}

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

{{-- <a href="{{ route('exportar.soporte') }}" class="botnExportar">CSV</a> --}}
<button class="botnExportar" id="exportarSoporte">Soporte</button>
{{-- <button class="botnExportar" id="exportarSoporteCliente">Asistencia x cliente</button> --}}
{{-- <button class="botnExportar" id="exportarSoporteColaborador">Asistencia x colaborador</button> --}}
{{-- <a href="{{ route('exportar.licencia') }}" class="botnExportar">Licencia</a> --}}
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover tablagrande">
        <thead>
            <tr class="text-center">
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">
                    <select name="select_empresa" id="select_empresa">
                        <option value=""></option>
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->nombre}}">{{$cliente->nombre}}</option>
                        @endforeach
                    </select>
                </th>
                <th scope="col">
                    <select name="colaborador" id="colaborador">
                        <option value=""></option>
                        <option value="Roxana Baez">Roxana Baez</option>
                        <option value="Norman Logo">Norman Logo</option>
                        <option value="Edwin Torres">Edwin Torres</option>
                        <option value="Jasson Ulloa">Jasson Ulloa</option>
                        <option value="José Rizo">José Rizo</option>
                        <option value="Kenneth Granados">Kenneth Granados</option>
                        <option value="Ramses Rivas">Ramses Rivas</option>
                        <option value="Mauro Pettyn">Mauro Pettyn</option>
                        <option value="Deyna López">Deyna López</option>
                    </select>
                </th>
                <th scope="col">
                    <input type="date" id="fecha1" name="fecha1">
                    <input type="date" id="fecha2" name="fecha2">
                </th>
                <th scope="col">
                    <select name="cliente" id="cliente">
                        <option value=""></option>
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->contacto}}">{{$cliente->contacto}}</option>
                        @endforeach
                    </select>
                </th>
                <th scope="col"></th>
                <th scope="col"></th>
                {{-- <th scope="col">Usuario</th> --}}
                <th scope="col">
                    <select name="estado" id="estado">
                        <option value=""></option>
                        <option value="Asignado">Asignado</option>
                        <option value="En Proceso">En Proceso</option>
                        <option value="Completo">Completo</option>
                    </select>
                </th>
                <th scope="col"></th>
                {{-- <th scope="col">NumLaboral</th> --}}
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">
                    <select name="origen_asistencia" id="origen_asistencia">
                        <option value=""></option>
                        <option value="Error de usuario">Error de usuario</option>
                        <option value="Error de software">Error de software</option>
                    </select>
                </th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            <tr class="text-center">
                <th scope="col">Acciones</th>
                <th scope="col">Ticket</th>
                <th scope="col">Empresa</th>
                <th scope="col">Colaborador</th>
                <th scope="col">Fecha y hora creacion del Ticket</th>
                <th scope="col">Cliente</th>
                <th scope="col">Software</th>
                <th scope="col">Prioridad</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha Inicial Asistencia</th>
                <th scope="col">Fecha Final Asistencia</th>
                <th scope="col">Total de horas</th>
                {{-- <th scope="col">Usuario</th> --}}
                {{-- <th scope="col">NumLaboral</th> --}}
                <th scope="col">Origen Asistencia</th>
                <th scope="col">Problema</th>
                <th scope="col">Soluciòn</th>
                <th scope="col">Observaciones</th>
                <th scope="col">Archivos</th>
            </tr>
        </thead>
        <tbody class="text-center" id="listaSoporte">
            @php
                use Carbon\Carbon;
            @endphp
            @foreach ($datos as $dato)
                <tr>
                    <td style="width: 9rem">
                        <a href="{{url('soporte/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        |
                        <form action="{{url('soporte/'.$dato->id)}}" method="POST" class="delete">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit"><ion-icon name="beaker-outline"></ion-icon></button>
                        </form>
                    </td>
                    <td>{{$dato->ticker}}</td>
                    <td>{{$dato->empresa}}</td>
                    <td>{{$dato->colaborador}}</td>
                    <td>{{$dato->fechaCreacionTicke}}</td>
                    <td>{{$dato->id_cliente}}</td>
                    <td>{{$dato->id_software}}</td>

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

                    <td>{{$dato->fechaInicioAsistencia}}</td>
                    <td>{{$dato->fechaFinalAsistencia}}</td>
                    <td>
                        @php
                            $fechaInicio = Carbon::parse($dato->fechaInicioAsistencia);
                            $fechaFinal = Carbon::parse($dato->fechaFinalAsistencia);
                            $diferencia = $fechaFinal->diff($fechaInicio);
                            $horas = $diferencia->h;
                            $minutos = $diferencia->i;
                        @endphp
                    
                        {{ $horas }} horas {{ $minutos }} minutos
                    </td>
                    {{-- <td>{{$dato->usuario}}</td> --}}
                    {{-- <td>{{$dato->numLaboral}}</td> --}}
                    <td>{{$dato->origen_asistencia}}</td>
                    <td>{{$dato->problema}}</td>
                    <td>{{$dato->solucion}}</td>
                    <td>{{$dato->observaciones}}</td>
                    <td>
                        @if ($dato->archivo)
                            @if (Str::contains($dato->archivo, ['.jpg', '.jpeg', '.png', '.gif']))
                                <img src="{{ asset('storage/' . $dato->archivo) }}" width="100">
                            @else
                                <a href="{{ asset('storage/' . $dato->archivo) }}" target="_blank"><ion-icon name="document-outline"></ion-icon></a>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- {{ $datos->links() }} --}}
<script>
    function exportarSoporte() {

    // Crear contenido del archivo CSV
    let csvContent = 'data:text/csv;charset=utf-8,';
    csvContent += 'Fecha,Empresa,Ticket,Fecha Inicial Asistencia,Fecha Final Asistencia,Total de horas,Usuario,Detalle Asitencia,Asesor\n'; // Encabezados de las columnas

    // Extrallendo los valores de los inputs
    const selectColaborador = document.querySelector('#colaborador');
    const selectCliente = document.querySelector('#cliente');
    const selectEstado = document.querySelector('#estado');
    const selectEmpresa = document.querySelector('#select_empresa');
    const selectOrigenAsistencia = document.querySelector('#origen_asistencia');
    const fecha1 = document.querySelector('#fecha1');
    const fecha2 = document.querySelector('#fecha2');

    let clienteFiltrado = selectCliente.value;
    let colaboradorFiltrado = selectColaborador.value;
    let estadoFiltrado = selectEstado.value;
    let empresaFiltrado = selectEmpresa.value;
    let origenAsistenciaFiltrado = selectOrigenAsistencia.value;
    let fecha1valor = fecha1.value;
    let fecha2valor = fecha2.value;

    // Decodificar un arreglo de laravel a javascript
    let tablaClientes = JSON.parse('{!! json_encode($datos) !!}');

    // Recorriendo el arreglo para para entrar a los valores
    tablaClientes.forEach((item) => {
    // Valor arreglo
    const fechaCreacionTicke = item.fechaCreacionTicke;
    const empresa = item.empresa;
    const ticker = item.ticker;
    const fechaInicioAsistencia = item.fechaInicioAsistencia;
    const fechaFinalAsistencia = item.fechaFinalAsistencia;

    // Sacar fecha
    const fecha1 = new Date(item.fechaInicioAsistencia);
    const fecha2 = new Date(item.fechaFinalAsistencia);
    const diff = Math.abs(fecha2 - fecha1); // Obtener la diferencia en milisegundos
    // Calcular horas y minutos
    const horas = Math.floor(diff / (1000 * 60 * 60));
    const minutos = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    const totalHoras = `${horas} horas y ${minutos} minutos`
    // Fin sacar fecha

    const id_cliente = item.id_cliente;
    const problema = item.problema;
    const colaborador = item.colaborador;
    const estado = item.estado;
    const origenAsistencia = item.origen_asistencia;
    // Fin valor arreglo

    // Haciendo condicionales en variables para un mejor orden con el if
    const coincideEmpresa = empresaFiltrado === '' || empresaFiltrado === empresa;
    const coincideEstado = estadoFiltrado === '' || estadoFiltrado === estado;
    const coincideOrigenAsistencia = origenAsistenciaFiltrado === '' || origenAsistenciaFiltrado === origenAsistencia;
    const coincideCliente = clienteFiltrado === '' || clienteFiltrado === id_cliente;
    const coincideColaborador = colaboradorFiltrado === '' || colaboradorFiltrado === colaborador;
    const coincideFecha1 = fecha1valor == '' || fecha1valor <= fechaCreacionTicke;
    const coincideFecha2 = fecha2valor == '' || fecha2valor >= fechaCreacionTicke;

    // si los datos se cumplen correctamente se mostraran los resultados
    if (((coincideCliente && coincideColaborador) && (coincideFecha1 && coincideFecha2)) && ((coincideEstado && coincideEmpresa) && coincideOrigenAsistencia)) {
        csvContent += `${fechaCreacionTicke},${empresa},${ticker},${fechaInicioAsistencia},${fechaFinalAsistencia},${totalHoras},${id_cliente},${problema},${colaborador}\n`;
    }
    });

    // Crear el enlace de descarga
    const encodedUri = encodeURI(csvContent);
    const link = document.createElement('a');
    link.setAttribute('href', encodedUri);
    link.setAttribute('download', 'Soportes.csv');

    // Simular el clic en el enlace para iniciar la descarga
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    }

    // Agregar un botón para iniciar la exportación
    const exportarButton = document.querySelector('#exportarSoporte');
    exportarButton.addEventListener('click', exportarSoporte);
</script>


<script>
    const idClienteSelect = document.querySelector('#id_cliente');
    const correoClienteInput = document.querySelector('#correo_cliente');
    const empresa = document.querySelector('#empresa');

    idClienteSelect.addEventListener('change', () => {
    const selectedValue = idClienteSelect.value;

    let tablaClientes = JSON.parse('{!! json_encode($clientes) !!}');

    tablaClientes.forEach(element => {
        let nombreCliente = element.contacto;
        let correoCliente = element.correo;
        let empresaCliente = element.nombre;

        if (nombreCliente == selectedValue) {
        correoClienteInput.value = correoCliente;
        empresa.value = empresaCliente;
        }
    });
    });
</script>
@endsection
