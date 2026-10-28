<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;
use App\Models\Juguete;

Route::get('/', function () {
    return view('home');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/hola', function () {
    return 'Hola desde Laravel';
});

Route::get('/inicio', function () {
    return view('home');
});

Route::get('/productos', function () {
    return redirect('/#productos');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function () {
    $credenciales = request()->only('email', 'password');

    if (Auth::attempt($credenciales)) {
        request()->session()->regenerate();

        return redirect()->intended('/pedidos');
    }

    return back()
        ->with('error', 'Correo o contraseña incorrectos.')
        ->withInput(request()->only('email'));
});

Route::post('/logout', function () {
    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/pedidos', [PedidoController::class, 'index'])
        ->name('pedidos.index');

    Route::post('/pedidos', [PedidoController::class, 'store'])
        ->name('pedidos.store');
});

Route::get('/juguetes', function () {
    $juguetes = Juguete::all();

    return view('juguetes.index', compact('juguetes'));
});

Route::get('/juguetes/nuevo', function () {
    return view('juguetes.nuevo');
});

Route::post('/juguetes/nuevo', function () {
    request()->validate([
        'nombre' => 'required',
        'precio' => 'required|integer',
    ], [
        'nombre.required' => 'Pone el nombre del juguete.',
        'precio.required' => 'Pone el precio del juguete.',
        'precio.integer' => 'Aca el precio va entero, sin decimales ni letras.',
    ]);

    Juguete::create([
        'nombre' => request()->input('nombre'),
        'precio' => request()->input('precio'),
    ]);

    return redirect('/juguetes');
});
