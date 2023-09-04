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

                <th scope="col"></th>

                <th scope="col" style="display: flex; flex-direction: column">
                    <input type="date" id="fecha1">
                    <input type="date" id="fecha2">
                </th>
            </tr>

            <tr class="text-center">
                <th scope="col">Empresa</th>
                <th scope="col">Cliente</th>
                <th scope="col">Cantidad de soportes</th>
                <th scope="col">Soportes por fecha</th>
            </tr>
        </thead>
        <tbody class="text-center" id="listaSoporte">
            @foreach ($arrayClientes as $soporte)
                <tr>
                    <td>{{$soporte['empresa']}}</td>
                    <td>{{$soporte['nombre']}}</td>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    const tbody = document.querySelectorAll('tbody tr');
    const inputSelectEmpresa = document.querySelector('#select_empresa');
    const inputcCliente = document.querySelector('#cliente');
    let soportes = JSON.parse('{!! json_encode($arrSoportes) !!}')
    const fecha1 = document.querySelector('#fecha1');
    const fecha2 = document.querySelector('#fecha2');

    tbody.forEach(item => {
        const cantidadSoporte = item.querySelector('td:nth-child(3)')

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
            const cantidadSoporte = item.querySelector('td:nth-child(3)')
            
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

    fecha1.addEventListener('change', () => {
        valorFecha1 = fecha1.value

        tbody.forEach(item => {
            item.querySelector('td:nth-child(4)').textContent = 0
            // item.querySelector('td').style.backgroundColor = 'white'
            // item.style.backgroundColor = 'white'
            funcionFiltrarFechas(item)
        })
    })
    fecha2.addEventListener('change', () => {
        valorFecha2 = fecha2.value

        tbody.forEach(item => {
            item.querySelector('td:nth-child(4)').textContent = 0
            // item.querySelector('td').style.backgroundColor = 'white'
            // item.style.backgroundColor = 'white'
            funcionFiltrarFechas(item)
        })
    })


    function funcionFiltrarFechas(item2) {
        const tbodyEmpresa = item2.querySelector('td:nth-child(1)').textContent
        const tbodycliente = item2.querySelector('td:nth-child(2)').textContent
        const tbodycantidad = item2.querySelector('td:nth-child(4)')

        soportes.forEach(item => {
                const fecha = item.fechaCreacionTicke
                const id_cliente = item.id_cliente
                const empresa = item.empresa


                if (valorFecha1 <= fecha && valorFecha2 >= fecha) {
                    if (valorFecha1 <= valorFecha2) {
                        if (tbodyEmpresa == empresa && tbodycliente == id_cliente) {
                            // console.log(`xxxxx${empresa} ${fecha}xxxxx`);
                            // console.log(`=====${tbodyEmpresa} ${valorFecha1}=====`);
                            tbodycantidad.textContent = parseInt(tbodycantidad.textContent) + 1
                            // tbodyEmpresa.style.backgroundColor = '#F4F6F6'
                            // tbodycliente.style.backgroundColor = '#F4F6F6'
                            // tbodycantidad.style.backgroundColor = '#D5DBDB'
                        }
                    }
                }else if (valorFecha1 <= fecha) {
                    if (tbodyEmpresa == empresa && tbodycliente == id_cliente) {
                        // console.log(`xxxxx${empresa} ${fecha}xxxxx`);
                        // console.log(`=====${tbodyEmpresa} ${valorFecha1}=====`);
                        tbodycantidad.textContent = parseInt(tbodycantidad.textContent) + 1
                        // tbodyEmpresa.style.backgroundColor = '#F4F6F6'
                        // tbodycliente.style.backgroundColor = '#F4F6F6'
                        // tbodycantidad.style.backgroundColor = '#D5DBDB'
                    }
                }
        })
    }
</script>
@endsection