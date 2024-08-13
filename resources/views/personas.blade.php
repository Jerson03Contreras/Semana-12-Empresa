@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Personas</h2>
        @isset($persona->category)
    <div>
        <h1 class="display-4 mb-0" style="font-size: 2rem;">{{ $persona->category->name }}</h1>
        <a href="{{ route('personas') }}">Regresar a la lista de personas</a>
    </div>
    @endisset
        @auth
        <a href="{{ route('personas.create') }}" class="btn btn-primary">Crear Nueva Persona</a>
        @endauth
    </div>
    @if ($personas->isEmpty())
    <div class="alert alert-warning" role="alert">
        No hay personas.
    </div>
    @else
    <div class="row">
        @foreach ($personas as $persona)
        <div class="col-md-4 mb-3">
            <div class="card">
                @if($persona->image)
                <img src="{{ asset('storage/'.$persona->image) }}" class="card-img-top" alt="{{ $persona->cPerNombre }}" style="width: 100%; height: 150px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('personas.show', ['nPerCodigo' => $persona->nPerCodigo]) }}">
                            {{ $persona->cPerNombre }} {{ $persona->cPerApellido }}
                        </a>
                    </h5>
                    <p class="card-text">
                        <strong>Dirección:</strong> {{ $persona->cPerDireccion }}<br>
                        <strong>Edad:</strong> {{ $persona->nPerEdad }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $personas->links('pagination::bootstrap-4') }}
    </div>
    @endif
</div>
@endsection
