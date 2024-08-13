<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Mensaje Recibido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333333;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            text-align: center;
            color: #4CAF50;
        }
        p {
            font-size: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #dddddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nuevo Mensaje Recibido</h1>
        <p>Recibiste un correo del sistema automático con los siguientes detalles:</p>
        <table>
            <tr>
                <th>Nombre</th>
                <td>{{ $mensaje['nombre'] }}</td>
            </tr>
            <tr>
                <th>Correo</th>
                <td>{{ $mensaje['email'] }}</td>
            </tr>
            <tr>
                <th>Asunto</th>
                <td>{{ $mensaje['asunto'] }}</td>
            </tr>
            <tr>
                <th>Mensaje</th>
                <td>{{ $mensaje['mensaje'] }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
