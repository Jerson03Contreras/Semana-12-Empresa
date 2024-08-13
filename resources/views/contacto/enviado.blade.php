@extends('layout')

@section('title', 'Confirmación de Envío')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Envío</title>
    <style>
        .confirmation-page {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
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
            color: #333333;
            text-align: center;
            font-size: 24px;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
            color: #666666;
        }
        .sender-info {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #dddddd;
            font-size: 14px;
            color: #999999;
        }
    </style>
</head>
<body>
    <div class="confirmation-page">
        <div class="container">
            <h1>Confirmación de Envío</h1>
            <p>Tu mensaje ha sido enviado correctamente.</p>
            <div class="sender-info">
                <p>Enviado por: {{ $nombre }}</p>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
