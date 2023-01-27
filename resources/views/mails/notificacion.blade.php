<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensajes Bee</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .contenedor{
            max-width: 1100px;
            min-height: 100vh;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        img{
            width: 100%;
        }
        .img{
            background: white;
        }
        .tamano{
            max-width: 25%;
        }
        span{
            opacity: .8;
        }
    </style>
</head>
<body>

    <div class="contenedor">

        <div class="tamano bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="img">
                <img class="rounded-t-lg" src="{{asset('img/logo.png')}}" alt="logo bee" />
            </div>
            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Soporte Realizado</h5>
                <p class="mb-2 text-1xl font-bold tracking-tight text-gray-900 dark:text-white"><span>Sticker:</span> {{$msg['sticker']}}</p>
                <p class="mb-2 text-1xl font-bold tracking-tight text-gray-900 dark:text-white"><span>Fecha y Hora Inicial:</span> {{$msg['fechaHoraInicio']}}</p>
                <p class="mb-2 text-1xl font-bold tracking-tight text-gray-900 dark:text-white"><span>Fecha y Hora Final:</span> {{$msg['fechaHoraFinal']}}</p>
                <p class="mb-2 text-1xl font-bold tracking-tight text-gray-900 dark:text-white"><span>Problema:</span> {{$msg['problema']}}</p>
                <p class="mb-2 text-1xl font-bold tracking-tight text-gray-900 dark:text-white"><span>Solución:</span> {{$msg['solucion']}}</p>
                <p class="mb-2 text-1xl font-bold tracking-tight text-gray-900 dark:text-white"><span>Observaciones:</span> {{$msg['observaciones']}}</p>
            </div>
        </div>

    </div>

    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
</body>
</html>
