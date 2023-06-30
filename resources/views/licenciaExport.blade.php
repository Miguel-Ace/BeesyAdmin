<table>
    <thead>
        <tr>
            <th scope="col">Cliente</th>
            <th scope="col">Software</th>
            <th scope="col">Cantidad de licencias</th>
            <th scope="col">Cantidad de usuarios</th>
            <th scope="col">BeeCommerce</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datos as $dato)
            <tr>
                <td>{{$dato->id_cliente}}</td>
                <td>{{$dato->id_software}}</td>
                <td>{{$dato->cantidad}}</td>
                <td>{{$dato->cantidad_usuario}}</td>
                <td>{{$dato->bee_commerce}}</td>
            </tr>
        @endforeach
    </tbody>
</table>