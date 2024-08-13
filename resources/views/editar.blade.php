@extends('layout')

@section('title','Editar Persona')

@section('content')
<table cellpadding='3' cellspaceing='5'>
<tr>
    @auth
    <img src="{{ asset('storage/'.$persona->image) }}" alt="{{ $persona->cPerNombre }}" width="200" height="100" >
    <th colspan="4">Editar Persona</th>
    @endauth
</tr>
@include('partials.validation-errors')
<form action="{{ route('personas.update', $persona) }}" method="post" enctype="multipart/form-data">
@method('PATCH')
@include('partials.form',['btnText' => 'Actualizar'])
</form>
</table>
@endsection
