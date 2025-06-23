<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StripeController;

// Página principal
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Página de detalle de habitación (con reseñas)
Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');

// Rutas autenticadas (usuarios logueados)
Route::middleware(['auth', 'verified'])->group(function () {
    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Reseñas
    Route::post('/rooms/{room}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    // Reservas de usuarios
    Route::get('/rooms/{room}/reservar', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/rooms/{room}/reservar', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/mis-reservas', [ReservationController::class, 'myReservations'])->name('my.reservations');

    // 🧾 Stripe - Pagos en línea
    Route::get('/pagar/{room}', [StripeController::class, 'show'])->name('stripe.checkout');
    Route::post('/pagar/{room}', [StripeController::class, 'charge'])->name('stripe.charge');
});

// Rutas protegidas para el administrador
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    // CRUD de habitaciones
    Route::resource('rooms', RoomController::class);

    // Vista de todas las reservas
    Route::get('/admin/reservas', [ReservationController::class, 'allReservations'])->name('admin.reservations');
});

require __DIR__.'/auth.php';
