<table>
    <thead>
        <tr>
            <th scope="col">Fecha</th>
            <th scope="col">Ticket</th>
            <th scope="col">Fecha Inicial Asistencia</th>
            <th scope="col">Fecha Final Asistencia</th>
            <th scope="col">Total de horas</th>
            <th scope="col">Usuario</th>
            <th scope="col">Detalle Asitencia</th>
            <th scope="col">Asesor</th>
        </tr>
    </thead>
    <tbody id="listaSoporte">
        @php
            use Carbon\Carbon;
        @endphp
        @foreach ($datos as $dato )
            <tr>
                <td>{{$dato->fechaCreacionTicke}}</td>
                <td>{{$dato->ticker}}</td>
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
                <td>{{$dato->id_cliente}}</td>
                <td>{{$dato->problema}}</td>
                <td>{{$dato->colaborador}}</td>
            </tr>
        @endforeach
    </tbody>
</table>