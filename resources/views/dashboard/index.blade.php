@extends('home')

@section('titulo')
    Dashboard
@endsection

@section('creacion')
    <div class="contadores">
        <div class="uno">
            Cantidad de Licencias
            <div>
                <div class="borde-icon">
                    <ion-icon name="layers-outline"></ion-icon>
                </div>
                <div>
                   {{ $totalLicencias }}
                </div>
            </div>
        </div>
        <div class="dos">
            Cantidad de Clientes
            <div>
                <div class="borde-icon">
                    <ion-icon name="calculator-outline"></ion-icon>
                </div>
                <div>
                    {{ $totalClientes }}
                </div>
            </div>
        </div>
        <div class="tres">
            Cantidad de Soportes
            <div>
                <div class="borde-icon">
                    <ion-icon name="book-outline"></ion-icon>
                </div>
                <div>
                    {{ $totalsoportes }}
                </div>
            </div>
        </div>
        <div class="cuatro">
            Cantidad de Proyectos
            <div>
                <div class="borde-icon">
                    <ion-icon name="layers-outline"></ion-icon>
                </div>
                <div>
                    {{ $totalproyectos }}
                </div>
            </div>
        </div>
    </div>

    <div class="graficos">
        <div class="grafos guno">
            <p>Tipos de licencias</p>
            <canvas id="myChart"></canvas>
        </div>
        <div class="grafos gdos">
            <p>Tipos de soporte</p>
            <canvas id="myChart2"></canvas>
        </div>
        <div class="grafos gtres">
            <p>Tipos de proyecto</p>
            <canvas id="myChart3"></canvas>
        </div>

        <div class="grafos gcuatro">
            {{-- <p>Licencias creadas del último mes</p> --}}
            <canvas id="myChart4"></canvas>
        </div>
        <div class="grafos gcinco">
            {{-- <p>Soportes del último mes</p> --}}
            <canvas id="myChart5"></canvas>
        </div>
        <div class="grafos gseis">
            {{-- <p>proyectos creados del último mes</p> --}}
            <canvas id="myChart6"></canvas>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const cData = JSON.parse(`<?php echo $data1; ?>`);
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
        type: 'pie',
        data: {
            labels: cData.label,
            datasets: [{
            label: '',
            data: cData.data,
            borderWidth: 1,
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
        });

        

        let clientes = JSON.parse('{!! json_encode($clientes) !!}')
        let empresas = JSON.parse('{!! json_encode($empresas) !!}')
        
        let infoSoporte = []
        let labels = []
        let datas = []

        clientes.forEach(cliente => {
            const valor = [cliente.nombre,0]
            infoSoporte.push(valor)
        })
        

        empresas.forEach(empresa => {
            for (let i = 0; i < infoSoporte.length; i++) {
                if (empresa == infoSoporte[i][0]) {
                    infoSoporte[i][1]++
                }
            }
        })

        infoSoporte.forEach(item => {
            labels.push(item[0])
            datas.push(item[1])
        })
        
        // console.log(infoSoporte)


        // const cData2 = JSON.parse(`<?php echo $data2; ?>`);
        const ctx2 = document.getElementById('myChart2');

        new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
            label: '',
            data: datas,
            borderWidth: 1,
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
        });

        const cData3 = JSON.parse(`<?php echo $data3; ?>`);
        const ctx3 = document.getElementById('myChart3');

        new Chart(ctx3, {
        type: 'pie',
        data: {
            labels: cData3.label,
            datasets: [{
            label: '',
            data: cData3.data,
            borderWidth: 1,
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
        });

        const cData4 = JSON.parse(`<?php echo $data4; ?>`);
        const ctx4 = document.getElementById('myChart4');

        new Chart(ctx4, {
        type: 'bar',
        data: {
            labels: cData4.label,
            datasets: [{
            label: 'Licencias creadas del último mes',
            data: cData4.data,
            borderWidth: 1,
            backgroundColor: [
                'rgb(244, 208, 63)',
                'rgb(192, 57, 34)',
                'rgb(0, 139, 140)',
                'rgb(41, 128, 185)',
            ],
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
        });

        const cData5 = JSON.parse(`<?php echo $data5; ?>`);
        const ctx5 = document.getElementById('myChart5');

        new Chart(ctx5, {
        type: 'bar',
        data: {
            labels: cData5.label,
            datasets: [{
            label: 'Soportes del último mes',
            data: cData5.data,
            borderWidth: 1,
            backgroundColor: [
                'rgb(0, 139, 140)',
                'rgb(192, 57, 34)',
                'rgb(244, 208, 63)',
                'rgb(41, 128, 185)',
            ],
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
        });

        const cData6 = JSON.parse(`<?php echo $data6; ?>`);
        const ctx6 = document.getElementById('myChart6');

        new Chart(ctx6, {
        type: 'bar',
        data: {
            labels: cData6.label,
            datasets: [{
            label: 'proyectos creados del último mes',
            data: cData6.data,
            borderWidth: 1,
            backgroundColor: [
                'rgb(192, 57, 34)',
                'rgb(244, 208, 63)',
                'rgb(41, 128, 185)',
                'rgb(0, 139, 140)',
            ],
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
        });
    </script>
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="text-center">
                
                <th scope="col">
                    <select name="select_empresa" id="select_empresa">
                        <option value=""></option>
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->nombre}}">{{$cliente->nombre}}</option>
                        @endforeach
                    </select>
                </th>

                <th scope="col">
                    <select name="cliente" id="cliente">
                        <option value=""></option>
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->contacto}}">{{$cliente->contacto}}</option>
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

                <th scope="col"></th>

                <th scope="col" style="display: flex; flex-direction: column">
                    <input type="date" id="fecha1">
                    <input type="date" id="fecha2">
                </th>
            </tr>

            <tr class="text-center">
                <th scope="col">Empresa</th>
                <th scope="col">Cliente</th>
                <th scope="col">Colaborador</th>
                <th scope="col">Cantidad de soportes</th>
                <th scope="col">Soportes por fecha</th>
                <th scope="col">Horas</th>
            </tr>
        </thead>
        <tbody class="text-center" id="listaSoporte">
            @foreach ($arrayClientes as $soporte)
                <tr>
                    <td>{{$soporte['empresa']}}</td>
                    <td>{{$soporte['nombre']}}</td>
                    <td></td>
                    <td>
                        @php
                            $arr = [];

                            for ($i=0; $i < count($soportes); $i++) {
                                // echo $soportes[$i]['id_cliente'];
                                if ($soporte['empresa'] == $soportes[$i]['empresa']) {
                                    $soporte['cantidad']++;
                                    array_push($arr, $soporte['cantidad']);
                                }
                            }
                            $ultimoElemento = end($arr); // Obtiene el último elemento

                            echo $ultimoElemento - 1;
                        @endphp
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @php
        use Carbon\Carbon;
    @endphp
    @foreach ($arrSoportes as $dato)
        <div class="info" style="display: none">
            <div>{{$dato->empresa}}</div>    
            <div>{{$dato->id_cliente}}</div>    
            <div>{{$dato->fechaInicioAsistencia}}</div>    
            <div>{{$dato->fechaFinalAsistencia}}</div>    
            <div>
                @php
                    $fechaInicio = Carbon::parse($dato->fechaInicioAsistencia);
                    $fechaFinal = Carbon::parse($dato->fechaFinalAsistencia);
                    $diferencia = $fechaFinal->diff($fechaInicio);
                    $horas = $diferencia->h;
                    $minutos = $diferencia->i;
                @endphp
            
                {{-- {{ $horas }} horas {{ $minutos }} minutos --}}
                {{$tiempoTotalEnMinutos = ($diferencia->h * 60) + $diferencia->i;}}
            </div>
            <div>{{$dato->colaborador}}</div>
        </div>
    @endforeach
</div>

<script>
    const tbody = document.querySelectorAll('tbody tr');
    const inputSelectEmpresa = document.querySelector('#select_empresa');
    const inputcCliente = document.querySelector('#cliente');
    const inputcColaborador = document.querySelector('#colaborador');
    let soportes = JSON.parse('{!! json_encode($arrSoportes) !!}')
    const fecha1 = document.querySelector('#fecha1');
    const fecha2 = document.querySelector('#fecha2');

    tbody.forEach(item => {
        const cantidadSoporte = item.querySelector('td:nth-child(4)')

    // Quitando los números negativos
        if (parseInt(cantidadSoporte.textContent) == -1) {
            cantidadSoporte.innerText = ''
        }    
    })

    // Filtrar información
    let empresaFiltrado = '';
    let clienteFiltrado = '';

    inputSelectEmpresa.addEventListener('change', () => {
        empresaFiltrado = inputSelectEmpresa.value
        funcionFiltrar()
    })

    inputcCliente.addEventListener('change', () => {
        clienteFiltrado = inputcCliente.value
        funcionFiltrar()
    })

    function funcionFiltrar() {

        tbody.forEach(item => {
            const empresa = item.querySelector('td:nth-child(1)').textContent
            const cliente = item.querySelector('td:nth-child(2)').textContent
            const cantidadSoporte = item.querySelector('td:nth-child(4)')
            
            // Variables comparativas
            const coincideEmpresa = empresaFiltrado === '' || empresaFiltrado === empresa
            const inputCliente = clienteFiltrado === '' || clienteFiltrado === cliente

            if (coincideEmpresa && inputCliente) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        })
    }

    let valorFecha1 = ''
    let valorFecha2 = ''
    let valorColaborador = ''
    const info = document.querySelectorAll('.info')

    fecha1.addEventListener('change', () => {
        valorFecha1 = fecha1.value
        valorColaborador = inputcColaborador.value
        tbody.forEach(item => {
            item.querySelector('td:nth-child(5)').textContent = 0
            item.querySelector('td:nth-child(6)').textContent = 0
            funcionFiltrarFechas(item)
        })
    })

    fecha2.addEventListener('change', () => {
        valorFecha2 = fecha2.value
        valorColaborador = inputcColaborador.value
        tbody.forEach(item => {
            item.querySelector('td:nth-child(5)').textContent = 0
            item.querySelector('td:nth-child(6)').textContent = 0
            funcionFiltrarFechas(item)
        })
    })


    function funcionFiltrarFechas(item2) {
        const tbodyEmpresa = item2.querySelector('td:nth-child(1)').textContent
        const tbodycliente = item2.querySelector('td:nth-child(2)').textContent
        const tbodycantidad = item2.querySelector('td:nth-child(5)')
        const tbodyHoras = item2.querySelector('td:nth-child(6)')

        // const tbodycolaborador = item2.querySelector('td:nth-child(3)').textContent

        soportes.forEach(item => {
                // const fecha = item.fechaCreacionTicke
                const fecha = item.fechaInicioAsistencia
                const id_cliente = item.id_cliente
                const empresa = item.empresa
                const colaborador = item.colaborador

                if (valorColaborador) {
                    if (valorFecha1 <= fecha && valorFecha2 >= fecha) {
                        if (tbodyEmpresa == empresa && tbodycliente == id_cliente) {
                            if (valorColaborador == colaborador) {
                                // console.log(valorColaborador);
                                // console.log(colaborador);
                                tbodycantidad.textContent = parseInt(tbodycantidad.textContent) + 1
                            }
                        }
                    }else if (valorFecha1 <= fecha) {
                        if (tbodyEmpresa == empresa && tbodycliente == id_cliente) {
                            if (valorColaborador == colaborador) {
                                // console.log(valorColaborador);
                                // console.log(colaborador);
                                tbodycantidad.textContent = parseInt(tbodycantidad.textContent) + 1
                            }
                        }
                    }
                }else{
                    if (valorFecha1 <= fecha && valorFecha2 >= fecha) {
                        if (tbodyEmpresa == empresa && tbodycliente == id_cliente) {
                            tbodycantidad.textContent = parseInt(tbodycantidad.textContent) + 1
                        }
                    }else if (valorFecha1 <= fecha) {
                        if (tbodyEmpresa == empresa && tbodycliente == id_cliente) {
                            tbodycantidad.textContent = parseInt(tbodycantidad.textContent) + 1
                        }
                    }
                }
        })

        info.forEach(item => {
            const empresa = item.querySelector('div:nth-child(1)').textContent
            const id_cliente = item.querySelector('div:nth-child(2)').textContent
            const fechaInicio = item.querySelector('div:nth-child(3)').textContent
            const fechaFin = item.querySelector('div:nth-child(4)').textContent
            const tiempoTotalMinutos = item.querySelector('div:nth-child(5)').textContent

            const colaborador = item.querySelector('div:nth-child(6)').textContent
            
            if (valorColaborador) {
                if (valorFecha1 <= fechaInicio && valorFecha2 >= fechaFin) {
                    if (valorFecha1 <= valorFecha2) {
                        if (tbodyEmpresa == empresa && tbodycliente == id_cliente) {
                            if (valorColaborador == colaborador) {
                                const horas = Math.floor(tiempoTotalMinutos / 60)
                                const minutosRestantes = tiempoTotalMinutos % 60
                                const horaFormateada = `${horas.toString().padStart(2, '0')}:${minutosRestantes.toString().padStart(2, '0')}`;
    
                                tbodyHoras.textContent = horaFormateada
                            }   
                        }
                    }
                }else if (valorFecha1 <= fechaInicio) {
                    if (tbodyEmpresa == empresa && tbodycliente == id_cliente) {
                        if (valorColaborador == colaborador) {
                            const horas = Math.floor(tiempoTotalMinutos / 60)
                            const minutosRestantes = tiempoTotalMinutos % 60
                            const horaFormateada = `${horas.toString().padStart(2, '0')}:${minutosRestantes.toString().padStart(2, '0')}`;

                            tbodyHoras.textContent = horaFormateada
                        }   
                    }
                }
            }else{
                if (valorFecha1 <= fechaInicio && valorFecha2 >= fechaFin) {
                    if (valorFecha1 <= valorFecha2) {
                        if (tbodyEmpresa == empresa && tbodycliente == id_cliente) {
                            
                            const horas = Math.floor(tiempoTotalMinutos / 60)
                            const minutosRestantes = tiempoTotalMinutos % 60
                            const horaFormateada = `${horas.toString().padStart(2, '0')}:${minutosRestantes.toString().padStart(2, '0')}`;

                            tbodyHoras.textContent = horaFormateada
                        }
                    }
                }else if (valorFecha1 <= fechaInicio) {
                    if (tbodyEmpresa == empresa && tbodycliente == id_cliente) {
                        // tbodyHoras.textContent = parseInt(tbodycantidad.textContent) + parseInt(tiempoTotalMinutos)
                        // console.log(`${empresa} ${id_cliente} ${tiempoTotalMinutos}`);
                        
                        const horas = Math.floor(tiempoTotalMinutos / 60)
                        const minutosRestantes = tiempoTotalMinutos % 60
                        const horaFormateada = `${horas.toString().padStart(2, '0')}:${minutosRestantes.toString().padStart(2, '0')}`;
                        
                        tbodyHoras.textContent = horaFormateada
                    }
                }
            }
        });
    }

    // Colaborador
    inputcColaborador.addEventListener('change', () => {
        valorColaborador = inputcColaborador.value
        tbody.forEach(item => {
            item.querySelector('td:nth-child(3)').textContent = 0
            funcionSoportesColaborador(item)

            if (valorFecha1 || valorFecha2) {
                item.querySelector('td:nth-child(5)').textContent = 0
                item.querySelector('td:nth-child(6)').textContent = 0
                funcionFiltrarFechas(item)
            }
        })
    })

    function funcionSoportesColaborador(item2) {
        const tbodyEmpresa = item2.querySelector('td:nth-child(1)').textContent
        const tbodycliente = item2.querySelector('td:nth-child(2)').textContent
        const tbodycolaborador = item2.querySelector('td:nth-child(3)')
 
        soportes.forEach(item => {
                const fecha = item.fechaCreacionTicke
                const id_cliente = item.id_cliente
                const empresa = item.empresa
                const colaborador = item.colaborador

                if ((tbodyEmpresa == empresa && tbodycliente == id_cliente) && valorColaborador == colaborador) {
                    // console.log(colaborador, empresa);
                    tbodycolaborador.textContent = parseInt(tbodycolaborador.textContent) + 1
                }

                // if (fecha1.value != '') {
                //     console.log(fecha1.value);
                // }
        })

        if (tbodycolaborador.textContent == 0) {
            tbodycolaborador.textContent = ''
        }

    }

</script>
@endsection