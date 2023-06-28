<table>
    <thead>
        <tr>
            <th scope="col">Cliente</th>
            <th scope="col">Software</th>
            <th scope="col">Cantidad de licencia</th>
            {{-- <th scope="col">Fecha Inicio</th> --}}
            {{-- <th scope="col">Fecha Final</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($datos as $dato)
            <tr>
                <td>{{$dato->id_cliente}}</td>
                <td>{{$dato->id_software}}</td>
                <td>{{$dato->cantidad}}</td>
                {{-- <td>{{$dato->fechaInicio}}</td> --}}
                {{-- <td>{{$dato->fechaFinal}}</td> --}}
            </tr>
        @endforeach
    </tbody>
</table>