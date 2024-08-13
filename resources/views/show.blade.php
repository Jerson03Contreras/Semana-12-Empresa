@extends('layout')
@section('title', 'Detalles de ' . $persona->cPerNombre . ' ' . $persona->cPerApellido)

@section('content')
<style>
    .action-buttons {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }

    .action-button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .action-button.edit-button {
        background-color: #4CAF50;
    }

    .action-button.edit-button:hover {
        background-color: #45a049;
    }

    .action-button.delete-button {
        background-color: #f44336;
    }

    .action-button.delete-button:hover {
        background-color: #da190b;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table th, .table td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #f2f2f2;
    }
</style>

<h2>Detalles de la Persona</h2>
@if($persona->image)
        <img src="{{ asset('storage/'.$persona->image) }}" alt="{{ $persona->nPerCodigo }}"
        width="200" height="100">
        @endif
@auth
<div class="action-buttons">
    <a href="{{ route('personas.edit', ['nPerCodigo' => $persona->nPerCodigo]) }}" class="action-button edit-button">Editar</a>
    <form action="{{ route('personas.destroy', ['nPerCodigo' => $persona->nPerCodigo]) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="action-button delete-button">Eliminar</button>
    </form>
</div>
@endauth

<table class="table">
    <tbody>
        <tr>
            <th>Código:</th>
            <td>{{ $persona->nPerCodigo }}</td>
        </tr>
        <tr>
            <th>Nombre:</th>
            <td>{{ $persona->cPerNombre }}</td>
        </tr>
        <tr>
            <th>Apellido:</th>
            <td>{{ $persona->cPerApellido }}</td>
        </tr>
        <tr>
            <th>Dirección:</th>
            <td>{{ $persona->cPerDireccion }}</td>
        </tr>
        <tr>
            <th>Fecha de Nacimiento:</th>
            <td>{{ $persona->dPerFecNac }}</td>
        </tr>
        <tr>
            <th>Edad:</th>
            <td>{{ $persona->nPerEdad }} años</td>
        </tr>
        <tr>
            <th>Sexo:</th>
            <td>{{ $persona->cPerSexo == 'Masculino' ? 'Masculino' : 'Femenino' }}</td>
        </tr>
        <tr>
            <th>Sueldo:</th>
            <td>${{ number_format($persona->nPerSueldo, 2) }}</td>
        </tr>
        <tr>
            <th>RND:</th>
            <td>{{ $persona->cPerRnd }}</td>
        </tr>
        <tr>
            <th>Estado:</th>
            <td>{{ $persona->nPerEstado == 1 ? '1' : '2' }}</td>
        </tr>
        <tr>
            <th>Creado:</th>
            <td>{{ $persona->created_at->diffForHumans() }}</td>
        </tr>
    </tbody>
</table>
@endsection
