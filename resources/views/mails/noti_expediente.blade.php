<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Expediente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }
        .btn{
            background-color: #d0dde6;
            font-size: 20px;
            padding: 0 10px;
            padding: 5px 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nuevo Expediente</h1>
        <p>¡Hola!</p>
        <p>Hay un nuevo expediente asignado a ti: {{$dato['id_user_soluciona'] == auth()->user()->id ? auth()->user()->name : 'Usuario'}}, que requiere evaluación. Por favor, revisa la información a continuación:</p>

        <!-- Detalles del expediente -->
        <ul>
            <li>Id: {{$dato['id']}}</li>
            <li>Expediente: {{$dato['expediente']}}</li>
            <li>Tipo: {{$dato['tipo']}}</li>
            <li>Prioridad: {{$dato['prioridad']}}
            <li>Estado: {{$dato['estado']}}
            <li>Fecha: {{$dato['fecha_entrada']}}
            <!-- Agrega más detalles según tus necesidades -->
        </ul>

        <a href="http://46.183.112.214/expedientes" class="btn">Revisar</a>
        <p>Gracias por tu atención.</p>
    </div>
</body>
</html>
