@extends('layouts.base')

@section('contenido')
    <h2>Registrar un juguete</h2>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/juguetes/nuevo" method="POST">
        @csrf

        <label for="nombre">nombre del juguete:</label>
        <input type="text" id="nombre" name="nombre">

        <br><br>

        <label for="precio">precio en Bs:</label>
        <input type="number" id="precio" name="precio">

        <br><br>

        <button type="submit">Registrar juguete</button>
    </form>
@endsection
