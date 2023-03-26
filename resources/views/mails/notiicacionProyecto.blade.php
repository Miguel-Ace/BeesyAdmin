<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensajes Bee</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">

    <style>
        .contenedor{
            min-height: 100vh;
            /* background-color: red; */
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .contenedor .tamano{
            /* display: flex;
            flex-direction: column; */
            /* justify-content: center; */
            /* align-items: center; */
            /* min-width: 500px; */
            padding: 2rem;
            margin: 0 auto;
            border: 2px solid goldenrod;
            border-radius: .5rem;
            /* text-align: center; */
            /* background-color: green; */
        }
        .contenedor .tamano .img{
            width: 200px;
            margin: 0 auto
            /* border: 1px solid red; */
        }
        .contenedor .tamano .contenido{
            font-size: 1.3rem;
            max-width: 418px;
        }
        .contenedor .tamano .contenido h4{
            text-align: center;
            font-weight: bold;
            letter-spacing: 1px;
            margin-top: unset
        }
        .contenedor .tamano .contenido p{
            font-size: 1.2rem;
        }
        .contenedor .tamano .contenido p span{
            font-weight: bold;
        }
        .contenedor .tamano .contenedorlink{
            max-width: 100%;
            margin: 0 auto;
        }
        .contenedor .tamano .contenedorlink .link{
            text-decoration: none;
            display: block;
            background-color: #F39200;
            /* color: black */
            font-weight: bold;
            margin: 0 auto;
            padding: .7rem 1rem;
            border-radius: .5rem;
            width: 110px;
        }
    </style>
</head>
<body>

    <div class="contenedor">

        <div class="tamano">
            
            <div class="img">
                <img style="max-width: 100%" src="https://beesys.net/wp-content/uploads/2022/09/logo.png" alt="logo beesy"/>
            </div>

            <div class="contenido">
                <h4 class="">Estimado/a Cliente</h4>
                <p>
                    La tarea <span style="color: #F39200">{{$msg['nombre_actividad']}}</span> se encuetra <span style="color: #F39200">{{$msg['id_estado']}}</span>, 
                    si desea más información o tiene alguna duda puede comunicarse con nosotros.
                </p>
                <p>
                    Atentamente,<br>
                    Beêsy
                </p>
                {{-- <p class=""><span>Ticket:</span> {{$msg['ticker']}}</p>
                <p class=""><span>Fecha y Hora:</span> {{$msg['fechaHoraInicio']}}</p> --}}
                {{-- <p class=""><span>Colaborador:</span> {{$msg['colaborador']}}</p> --}}
                {{-- <p class=""><span>Fecha y Hora Final:</span> {{$msg['fechaHoraFinal']}}</p> --}}
                {{-- <p class=""><span>Problema:</span> {{$msg['problema']}}</p>
                <p class=""><span>Prioridad:</span> {{$msg['prioridad']}}</p>
                <p class=""><span>Estado:</span> {{$msg['estado']}}</p>
                <p class=""><span>Solución:</span> {{$msg['solucion']}}</p>
                <p class=""><span>Observaciones:</span> {{$msg['observaciones']}}</p> --}}
            </div>
        </div>

    </div>

    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
</body>
</html>
