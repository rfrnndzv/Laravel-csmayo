@extends('plantilla')

@section('contenido')
    <h1>Correo Electrónico</h1>
    <p>Este es el primer correo que mandaré por Laravel 8</p>

    <p><strong>Nombre: </strong>{{ $contacto['nombre'] }}</p>
    <p><strong>Correo: </strong>{{ $contacto['correo'] }}</p>
    <p><strong>Mensaje: </strong>{{ $contacto['mensaje'] }}</p>
@endsection