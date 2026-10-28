@extends('layouts.base')

@section('contenido')
    <p>Jugueteria el trompo es una jugueteria de barrio que ofrece juguetes para todas las edades.</p>

    <h2>Juguetes en el estante</h2>

    <p>Hay {{ count($juguetes) }} Juguetes en el estante.</p>

    <ul>
        @foreach ($juguetes as $juguete)
            <li>{{ $juguete->nombre }} - Bs {{ $juguete->precio }}</li>
        @endforeach
    </ul>

    <p>Estante atendido por Luis Alejandro Terceros Gutierrez</p>

    <a href="/juguetes/nuevo">Registrar un juguete</a>
@endsection
