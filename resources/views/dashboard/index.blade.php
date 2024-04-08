@extends('home')
@vite(['resources/js/dashboard.js','resources/sass/pantalla_de_carga.scss'])

<div class="display-carga">
    <div class="cajita">
        <span class="s1"></span>
        <span class="s2"></span>
        <span class="s3"></span>
    </div>
</div>

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
                   {{ $total_licencia }}
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
                    {{ $total_cliente }}
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
                    {{ $total_soporte }}
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
                    {{ $total_proyecto }}
                </div>
            </div>
        </div>
    </div>

    <div class="graficos">
        <div class="grafico-soporte">
            <canvas id="grafico-soporte" class="grafo"></canvas>
        </div>
        {{-- <div class="grafos gdos">
        </div> --}}
    </div>
@endsection

@section('tablas')
<div class="col-md-12 fs-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="text-center">
                
                <th scope="col">
                    <select name="select_empresa" id="select_empresa" class="select_empresa">
                        <option value=""></option>
                        @foreach ($empresa_clientes as $empresa)
                            <option value="{{$empresa}}">{{$empresa}}</option>
                        @endforeach
                    </select>
                </th>

                <th scope="col">
                    <select name="cliente" id="cliente" class="cliente">
                        <option value=""></option>
                        @foreach ($contacto_clientes as $contacto)
                            <option value="{{$contacto}}">{{$contacto}}</option>
                        @endforeach
                    </select>
                </th>

                <th scope="col">
                    <select name="colaborador" id="colaborador" class="colaborador">
                      <option value=""></option>
                      @foreach ($soportes as $soporte)
                        <option value="{{$soporte}}">{{$soporte}}</option>
                      @endforeach
                    </select>
                </th>

                <th scope="col"></th>

                {{-- <th scope="col" style="display: flex; flex-direction: column">
                    <input type="date" id="fecha1" class="fecha1">
                    <input type="date" id="fecha2" class="fecha2">
                </th> --}}
            </tr>

            <tr class="text-center">
                <th scope="col">Empresa</th>
                <th scope="col">Cliente</th>
                <th scope="col">Cantidad de soportes (Colaborador)</th>
                <th scope="col">Cantidad de soportes</th>
                {{-- <th scope="col">Soportes por fecha</th> --}}
                {{-- <th scope="col">Horas</th> --}}
            </tr>
        </thead>
        <tbody class="text-center" id="listaSoporte">
        </tbody>
    </table>
</div>
@endsection