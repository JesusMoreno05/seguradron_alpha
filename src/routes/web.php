<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
=======
use Illuminate\Http\Request;
use App\Models\Dron;
use App\Models\anuncio;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\AdminAnuncioController;
use App\Http\Controllers\ReviewPageController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\ProfileController;
>>>>>>> 1a20c15cc90aadfeaf58fea8379e3e9f06288b98

Route::get('/', function () {
    return view('home');
})->name('home');

<<<<<<< HEAD
Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');
=======
Route::get('/comprar', function (Request $request) {
    $anuncios = anuncio::with(['dron.make', 'dron.etiquetas', 'user'])
        ->where('visible', true);

    $buscar = trim((string) $request->query('buscar', ''));
    if ($buscar !== '') {
        $anuncios->where(function ($query) use ($buscar) {
            $query->where('titulo', 'like', '%' . $buscar . '%')
                ->orWhereHas('dron', function ($dronQuery) use ($buscar) {
                    $dronQuery->where('nombre', 'like', '%' . $buscar . '%');
                });
        });
    }

    $marcas = array_filter((array) $request->query('marca', []));
    if (!empty($marcas)) {
        $marcas = array_map('strtolower', $marcas);
        $anuncios->whereHas('dron.make', function ($makeQuery) use ($marcas) {
            $makeQuery->whereIn('nombre', $marcas);
        });
    }

    $categorias = array_filter((array) $request->query('categoria', []));
    if (!empty($categorias)) {
        $sectorMap = [
            'agricultura' => ['Agricultura de Precisión'],
            'industrial' => ['Industrial'],
            'seguridad' => ['Seguridad Frente a Incendios'],
        ];
        $nombreMap = [
            'fotografia' => ['fotografía aérea'],
            'rescate-marino' => ['búsqueda y rescate'],
        ];

        $sectores = [];
        $nombres = [];
        foreach ($categorias as $categoria) {
            if (isset($sectorMap[$categoria])) {
                $sectores = array_merge($sectores, $sectorMap[$categoria]);
            }
            if (isset($nombreMap[$categoria])) {
                $nombres = array_merge($nombres, $nombreMap[$categoria]);
            }
        }

        $sectores = array_values(array_unique($sectores));
        $nombres = array_values(array_unique($nombres));

        if (!empty($sectores) || !empty($nombres)) {
            $anuncios->whereHas('dron.etiquetas', function ($etiquetaQuery) use ($sectores, $nombres) {
                $etiquetaQuery->where(function ($query) use ($sectores, $nombres) {
                    if (!empty($sectores)) {
                        $query->whereIn('sector', $sectores);
                    }
                    if (!empty($nombres)) {
                        $query->orWhereIn('nombre', $nombres);
                    }
                });
            });
        }
    }

    $precioMax = $request->query('precio_max');
    if (is_numeric($precioMax)) {
        $anuncios->where('precio', '<=', (float) $precioMax);
    }

    $anuncios = $anuncios->get();

    return view('comprar', compact('anuncios'));
})->name('comprar');

Route::get('/nosotros', [NosotrosController::class, 'index'])->name('nosotros');
>>>>>>> 1a20c15cc90aadfeaf58fea8379e3e9f06288b98

Route::get('/contacta', function () {
    return view('contacta');
})->name('contacta');

Route::get('/servicio', function () {
    return view('servicio');
})->name('servicio');

<<<<<<< HEAD
Route::get('/politica', function () {
    return view('politica');
})->name('politica');
=======
// Rutas de autenticación
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas
Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil')->middleware('auth');
Route::patch('/perfil', [ProfileController::class, 'update'])->name('perfil.update')->middleware('auth');

// Rutas de anuncios protegidas
Route::get('/anuncio/crear', [AnuncioController::class, 'create'])->name('anuncio.crear')->middleware('auth');
Route::post('/anuncio/crear', [AnuncioController::class, 'store'])->name('anuncio.store')->middleware('auth');
Route::get('/anuncio/{anuncio}/editar', [AnuncioController::class, 'edit'])->name('anuncio.edit')->middleware('auth');
Route::patch('/anuncio/{anuncio}', [AnuncioController::class, 'update'])->name('anuncio.update')->middleware('auth');

// Gestión de usuarios (solo admin)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/usuarios', [UserManagementController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/{user}/editar', [UserManagementController::class, 'edit'])->name('usuarios.edit');
    Route::patch('/usuarios/{user}', [UserManagementController::class, 'update'])->name('usuarios.update');
    Route::patch('/usuarios/{user}/role', [UserManagementController::class, 'updateRole'])->name('usuarios.role');
    Route::delete('/usuarios/{user}', [UserManagementController::class, 'destroy'])->name('usuarios.destroy');

    Route::get('/admin/anuncios', [AdminAnuncioController::class, 'index'])->name('admin.anuncios.index');
    Route::patch('/admin/anuncios/{anuncio}/aprobar', [AdminAnuncioController::class, 'approve'])->name('admin.anuncios.approve');
    Route::patch('/admin/anuncios/{anuncio}/ocultar', [AdminAnuncioController::class, 'hide'])->name('admin.anuncios.hide');
    Route::delete('/admin/anuncios/{anuncio}', [AdminAnuncioController::class, 'destroy'])->name('admin.anuncios.destroy');
});

Route::middleware(['auth', 'assistant'])->group(function () {
    Route::get('/admin/nosotros', [NosotrosController::class, 'manage'])->name('nosotros.cards.index');
    Route::post('/admin/nosotros', [NosotrosController::class, 'store'])->name('nosotros.cards.store');
    Route::delete('/admin/nosotros/{card}', [NosotrosController::class, 'destroy'])->name('nosotros.cards.destroy');
});
>>>>>>> 1a20c15cc90aadfeaf58fea8379e3e9f06288b98
