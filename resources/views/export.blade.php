<table>
    <thead>
        <tr>
            <th scope="col">Ticker</th>
            <th scope="col">Colaborador</th>
            <th scope="col">Cliente</th>
            <th scope="col">Fecha Inicial</th>
            <th scope="col">Fecha Final</th>
            <th scope="col">Software</th>
            <th scope="col">NumLaboral</th>
            <th scope="col">Problema</th>
            <th scope="col">Prioridad</th>
            <th scope="col">Estado</th>
            <th scope="col">Solucion</th>
            <th scope="col">Observaciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datos as $dato )
            <tr>
                <td>{{$dato->ticker}}</td>
                <td>{{$dato->colaborador}}</td>
                <td>{{$dato->id_cliente}}</td>
                <td>{{$dato->fechaHoraInicio}}</td>
                <td>{{$dato->fechaHoraFinal}}</td>
                <td>{{$dato->id_software}}</td>
                <td>{{$dato->numLaboral}}</td>
                <td>{{$dato->problema}}</td>
                <td>{{$dato->prioridad}}</td>
                <td>{{$dato->estado}}</td>
                <td>{{$dato->solucion}}</td>
                <td>{{$dato->observaciones}}</td>
            </tr>
        @endforeach
    </tbody>
</table>