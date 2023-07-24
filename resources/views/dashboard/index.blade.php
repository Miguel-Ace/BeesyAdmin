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
        
        console.log(infoSoporte)


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