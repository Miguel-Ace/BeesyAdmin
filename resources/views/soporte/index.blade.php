@extends('home')

@vite(['resources/js/filtro.js','resources/js/exportSoporte.js','resources/js/soporte.js','resources/sass/pantalla_de_carga.scss'])

<div class="display-carga">
    <div class="cajita">
        <span class="s1"></span>
        <span class="s2"></span>
        <span class="s3"></span>
    </div>
</div>

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
                <input type="number" class="form-control" min="{{$cantidad}}" max="{{$cantidad}}" id="ticker" name="ticker"  value="{{$cantidad}}">
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
                <option {{ old('colaborador') == 'Gerson Ruiz' ? 'selected' : '' }} value="Gerson Ruiz">Gerson Ruiz</option>
                <option {{ old('colaborador') == 'Gabriel Reyes' ? 'selected' : '' }} value="Gabriel Reyes">Gabriel Reyes</option>
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

          <div class="col-md-4 mb-3">
            <label for="empresa" class="form-label">Empresa</label>
            <select class="form-select" name="empresa" id="empresa" @error("empresa")style="border: solid 2px red"@enderror>
              <option value="" selected disabled>Selecciona un Cliente</option>
              @foreach ($clientes->sortBy('nombre') as $cliente)
                <option {{ old('empresa') == $cliente->nombre ? 'selected' : '' }} value="{{$cliente->nombre}}" id="{{$cliente->id}}">{{$cliente->nombre}}</option>
              @endforeach
            </select>
          </div>

            <div class="col-md-4 d-none">
                <div class="mb-3">
                    <label for="id_cliente" class="form-label">Cliente</label>
                    <input type="text" class="form-control" id="id_cliente" name="id_cliente" value="{{old('id_cliente')}}" @error("id_cliente")style="border: solid 2px red"@enderror>
                </div>
            </div>

          <div class="col-md-4 mb-3">
            <label for="user_cliente" class="form-label">Usuario Cliente</label>
            <select class="form-select" name="user_cliente" id="user_cliente">
                <option value="" selected disabled>Selecciona al Usuario del Cliente</option>
                {{-- Se llena con js --}}
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
                  <option {{ old('origen_asistencia') == 'Asistencia' ? 'selected' : '' }} value="Asistencia">Asistencia</option>
                  <option {{ old('origen_asistencia') == 'Garantía' ? 'selected' : '' }} value="Garantía">Garantía</option>
                  <option {{ old('origen_asistencia') == 'Instalación' ? 'selected' : '' }} value="Instalación">Instalación</option>
                  <option {{ old('origen_asistencia') == 'Configuración' ? 'selected' : '' }} value="Configuración">Configuración</option>
                  <option {{ old('origen_asistencia') == 'Capacitación' ? 'selected' : '' }} value="Capacitación">Capacitación</option>
                  <option {{ old('origen_asistencia') == 'Mejora' ? 'selected' : '' }} value="Mejora">Mejora</option>
                  <option {{ old('origen_asistencia') == 'Especialización' ? 'selected' : '' }} value="Especialización">Especialización</option>
                  <option {{ old('origen_asistencia') == 'Importación' ? 'selected' : '' }} value="Importación">Importación</option>
                  <option {{ old('origen_asistencia') == 'Servidor' ? 'selected' : '' }} value="Servidor">Servidor</option>
                  <option {{ old('origen_asistencia') == 'Reunión' ? 'selected' : '' }} value="Reunión">Reunión</option>
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

          <div class="col-md-12">
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

        <div class="col-md-4">
            <label for="interno">Soporte interno</label>
            <input type="checkbox" name="interno" id="interno" value="1">
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

<div class="check-completados">
    <input type="checkbox" name="completados" id="completados">
    <label for="completados">Quitar Completados</label>
</div>

<button class="botnExportar" id="exportarSoporte">Soporte</button>
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
                        <option value="Gerson Ruiz">Gerson Ruiz</option>
                        <option value="Gabriel Reyes">Gabriel Reyes</option>
                    </select>
                </th>
                <th scope="col"></th>
                <th scope="col">
                    <input type="date" id="fecha1" name="fecha1">
                    <input type="date" id="fecha2" name="fecha2">
                </th>
                <th scope="col"></th>
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
                        <option value="Asistencia">Asistencia</option>
                        <option value="Garantía">Garantía</option>
                        <option value="Instalación">Instalación</option>
                        <option value="Configuración">Configuración</option>
                        <option value="Capacitación">Capacitación</option>
                        <option value="Mejora">Mejora</option>
                        <option value="Especialización">Especialización</option>
                        <option value="Importación">Importación</option>
                        <option value="Servidor">Servidor</option>
                        <option value="Reunión">Reunión</option>
                    </select>
                </th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            <tr class="text-center">
                <th scope="col">Acciones</th>
                <th scope="col">Ticket</th>
                <th scope="col">Empresa</th>
                <th scope="col">Colaborador</th>
                <th scope="col">Problema</th>
                <th scope="col">Fecha y hora creacion del Ticket</th>
                <th scope="col">Fecha prevista cumplimiento</th>
                <th scope="col">Cliente</th>
                <th scope="col">Usuario del Cliente</th>
                <th scope="col">Software</th>
                <th scope="col">Prioridad</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha Inicial Asistencia</th>
                <th scope="col">Fecha Final Asistencia</th>
                <th scope="col">Total de horas</th>
                {{-- <th scope="col">Usuario</th> --}}
                {{-- <th scope="col">NumLaboral</th> --}}
                <th scope="col">Origen Asistencia</th>
                <th scope="col">Soluciòn</th>
                <th scope="col">Observaciones</th>
                {{-- <th scope="col">Archivos</th> --}}
            </tr>
        </thead>
        <tbody class="text-center" id="listaSoporte">
            {{-- @php
                use Carbon\Carbon;
            @endphp --}}
            
            {{-- @foreach ($datos as $dato)
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
                    <td>{{$dato->problema}}</td>
                    <td>{{$dato->fechaCreacionTicke}}</td>
                    <td>{{$dato->fecha_prevista_cumplimiento}}</td>
                    <td>{{$dato->id_cliente}}</td>
                    <td>{{$dato->user_cliente}}</td>
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
                            $dias = $diferencia->days;
                            $horas = $diferencia->h;
                            $minutos = $diferencia->i;
                            
                        @endphp
                        <p style="color: #795548" class="color-dias">{{ $dias }} dias </p>
                        <p style="color: #004D40" class="color-horas">{{ $horas }} horas </p>
                        <p style="color: #F06292" class="color-min">{{ $minutos }} minutos </p>
                    </td>
                    <td>{{$dato->origen_asistencia}}</td>
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
            @endforeach --}}
        </tbody>
    </table>
</div>

{{-- {{ $datos->links() }} --}}

<script>
    // Cambiar los nombres por cambios en el sistema
    const tablaClientes = document.querySelectorAll('tbody tr')
    tablaClientes.forEach(item => {
        const origenAsistencia = item.querySelector('td:nth-child(16)');
        if (origenAsistencia.textContent == 'Error de usuario') {
            origenAsistencia.textContent = 'Asistencia'
        }
        if (origenAsistencia.textContent == 'Error de software') {
            origenAsistencia.textContent = 'Garantía'
        }
    });
</script>

<script>
    const idClienteSelect = document.querySelector('#id_cliente');
    const correoClienteInput = document.querySelector('#correo_cliente');
    const empresa = document.querySelector('#empresa');

    empresa.addEventListener('change', () => {
    const selectedValue = empresa.value;

    let tablaClientes = JSON.parse('{!! json_encode($clientes) !!}');

        tablaClientes.forEach(element => {
            let nombreCliente = element.nombre;
            let correoCliente = element.correo;
            let empresaCliente = element.contacto;

            if (nombreCliente == selectedValue) {
            correoClienteInput.value = correoCliente;
            idClienteSelect.value = empresaCliente;
            idClienteSelect.setAttribute('idE',element.id)
            }
        });
    });

    // Evitando que se presione 2 veces click al enviar el formulario
    const btnEnviar = document.querySelector('.enviar')
    
    btnEnviar.addEventListener('click', () => {
        if (btnEnviar.disabled == false) {
            setTimeout(function () {
            btnEnviar.disabled = true;
            }, 10); // Cambia 10 a la cantidad de milisegundos que desees
        }
    });

    // Agregando a los usuarios de los clientes al campo user_cliente
    let tablaUserClientes = JSON.parse('{!! json_encode($usuarioclientes) !!}');
    const userCliente = document.querySelector('#user_cliente')

    tablaUserClientes.forEach(item => {
        userCliente.innerHTML += `
            <option value="${item.name}" cl="${item.cliente}">${item.name}</option>
        `
    });

    empresa.addEventListener('change', () => {
        extraerCliente()
    })

    function extraerCliente() {
        const idCliente = idClienteSelect.getAttribute('idE')
        const userClientes = userCliente.querySelectorAll('option')
    
        userClientes.forEach(item => {
            const idCl = item.getAttribute('cl')
            if (idCl != idCliente) {
                item.style.display = 'none'
            }else{
                item.style.display = ''
            }
        });
    }
</script>
@endsection
