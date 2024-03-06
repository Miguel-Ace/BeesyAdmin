@vite(['resources/js/graficoRespuesta.js','resources/js/exportRespuesta.js'])
@extends('home')
<style>
    .contenedor-barra{
        transition: .3s ease;
        position: absolute;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        visibility: hidden;
        opacity: 0;
    }
    .contenedor-barra .estruct-barra{
        position: relative;
        transition: .3s ease;
        width: 60%;
        background: white;
        box-shadow: 0 0 20px 2px;
        position: absolute
    }
    .contenedor-barra .estruct-barra .selectBarras{
        position: absolute;
        display: flex;
        gap: 10px;
        flex-direction: column;
        top: 0;
        right: -130px;
        /* box-shadow: 0 0 5px 2px; */
        background: white;
        padding: 10px;
        border: 1px solid;
    }
    .contenedor-barra .estruct-barra .selectBarras button:hover{
        font-weight: 900;
    }
    .contenedor-barra .estruct-barra .salir-grafico-respuesta{
        position: absolute;
        font-size: 40px;
        cursor: pointer;
        right: 2%;
        top: -3%;
        font-weight: bold;
        z-index: 1;
    }
    .ocultar{
        display: none
    }
    .activo{
        opacity: 1;
        visibility: visible;
    }
    .activo .estruct-barra{
        width: 40%;
    }
    .utilities{
        display: flex;
        align-items: center;
        gap: 30px;
        font-size: 20px;
    }
    .utilities ion-icon{
        transition: .3s ease;
        cursor: pointer;
        scale: 1.2
    }
    .utilities ion-icon:hover{
        scale: 1.5
    }
    .utilities span{
        transition: .3s ease;
        background: green;
        padding: 0 5px;
        color: white;
        border-radius: 4px;
        cursor: pointer;
        scale: .9
    }
    .utilities span:hover{
        scale: 1
    }
</style>
@section('titulo')
Nos Importas (respuesta)
@endsection

@section('tituloForm')
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

@endsection
<div class="contenedor-barra">
    <div class="estruct-barra barra">
        <span class="salir-grafico-respuesta">x</span>
        <canvas id="myChart"></canvas>
        <div class="selectBarras">
            <button class="btnPrincipal">Principal</button>
        </div>
    </div>
    <div class="estruct-barra barra1">
    </div>
    <div class="estruct-barra barra2">
    </div>
</div>

@section('tituloTabla')
Lista de respuestas

<div class="utilities">
    <ion-icon name="bar-chart-outline" class="icon-barra"></ion-icon>
    <span class="csv-resp">csv</span>
</div>
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col"># Pregunta</th>
                <th scope="col"># Respuesta</th>
                <th scope="col">Cédula del cliente</th>
                <th scope="col">Cliente</th>
                <th scope="col">País</th>
                <th scope="col">Usuario</th>
                <th scope="col">Fecha</th>
                <th scope="col">Intento</th>
                <th scope="col">Notas</th>
                {{-- <th scope="col">Acciones</th> --}}
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($datos as $dato )
                <tr>
                    <td>{{$dato->id_pregunta}}</td>
                    <td>{{$dato->num_respuesta}}</td>
                    <td>{{$dato->cedula_cliente}}</td>
                    <td>{{$dato->cliente}}</td>
                    <td>{{$dato->pais}}</td>
                    <td>{{$dato->usuario}}</td>
                    <td>{{$dato->fecha_hora}}</td>
                    <td>{{$dato->num_intento}}</td>
                    <td>{{$dato->notas}}</td>
                    {{-- <td>
                        <a href="{{url('preguntas/'.$dato->id.'/edit')}}" class="edit"><ion-icon name="pencil-outline"></ion-icon></a>
                        |
                        <form action="{{url('preguntas/'.$dato->id)}}" method="POST" class="delete">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit"><ion-icon name="beaker-outline"></ion-icon></button>
                        </form>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script>
  const selectBarras = document.querySelector('.selectBarras')
  let countPreguntas = JSON.parse('{!! json_encode($countPreguntas) !!}');
  let respuesta = JSON.parse('{!! json_encode($datos) !!}');
  let sumatoriaPreguntas = []
  let sumatoriaRespuestas = [0,0,0,0,0]


//   console.log(countPreguntas.length);
//   console.log(respuesta);
  
  for (let i = 0; i < countPreguntas.length; i++) {
    sumatoriaPreguntas[i] = 0
    const button = document.createElement('button')
    button.setAttribute('id',countPreguntas[i])
    button.textContent = `Pregunta id: ${countPreguntas[i]}`
    selectBarras.appendChild(button)
  }
  
  for (let i = 0; i < countPreguntas.length; i++) {
    for (const item of respuesta) {
      if (item.id_pregunta == countPreguntas[i]) {
        sumatoriaPreguntas[i]++
      }
    }
  }

  const buttons = document.querySelectorAll('.selectBarras button')
  const barra1 = document.querySelector('.barra1')
  const barra2 = document.querySelector('.barra2')
  for (const item of buttons) {
    item.addEventListener('click', () => {
        if (item.getAttribute('id')) {
            filtrarDatos(item.getAttribute('id'))
            barra2.style = 'display:none'
            barra1.style = 'display:'
        }else{
            modulo()
            barra1.style = 'display:none'
            barra2.style = 'display:'
        }
    })
  }

  function filtrarDatos(id){
    const itemFiltrado = respuesta.filter(x => x.id_pregunta == id)
    sumatoriaRespuestas = [0,0,0,0,0]
    for (const item of itemFiltrado) {
        if (item.num_respuesta == 1) {
            sumatoriaRespuestas[0]++
        }
        if (item.num_respuesta == 2) {
            sumatoriaRespuestas[1]++
        }
        if (item.num_respuesta == 3) {
            sumatoriaRespuestas[2]++
        }
        if (item.num_respuesta == 4) {
            sumatoriaRespuestas[3]++
        }
        if (item.num_respuesta == 5) {
            sumatoriaRespuestas[4]++
        }
    }
    
    charSelect(id,sumatoriaRespuestas)
  }

const ctx = document.getElementById('myChart');
new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: countPreguntas,
    datasets: [{
      // label: ['Historial Preguntas'],
      data: sumatoriaPreguntas,
      borderWidth: 2,
      backgroundColor: [
          '#BB8FCE',
          '#7FB3D5',
          '#73C6B6',
          '#EC7063',
          '#196F3D',
          '#B9770E',
          '#A04000',
        ]
    }]
  },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position: 'top',
            },
            title: {
                display: true,
                text: 'Veces que se seleccionó una pregunta'
            }
        }
    },
});

function charSelect(dataId,sumatoriaRespuestas) {
    barra1.innerHTML = `
        <canvas id="myChart1"></canvas>
    `
    const ctx1 = document.getElementById('myChart1');
    new Chart(ctx1, {
    type: 'doughnut',
    data: {
        labels: [1,2,3,4,5],
        datasets: [{
        // label: ['Historial Preguntas'],
        data: sumatoriaRespuestas,
        borderWidth: 2,
        backgroundColor: [
            '#BB8FCE',
            '#7FB3D5',
            '#73C6B6',
            '#EC7063',
            '#196F3D',
            '#B9770E',
            '#A04000',
            ]
        }]
    },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
                title: {
                    display: true,
                    text: `Pregunta ${dataId}`
                }
            }
        },
    });
}

function modulo() {
    barra2.innerHTML = `
        <canvas id="myChart2"></canvas>
    `
    const ctx2 = document.getElementById('myChart2');
    new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: countPreguntas,
        datasets: [{
        // label: ['Historial Preguntas'],
        data: sumatoriaPreguntas,
        borderWidth: 2,
        backgroundColor: [
            '#BB8FCE',
            '#7FB3D5',
            '#73C6B6',
            '#EC7063',
            '#196F3D',
            '#B9770E',
            '#A04000',
            ]
        }]
    },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Veces que se seleccionó una pregunta'
                }
            }
        },
    });
}
</script>