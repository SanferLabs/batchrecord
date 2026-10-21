<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\BatchUser;
use App\Http\Controllers\BatchRecordController;

Route::get('/', fn() => redirect('/login'));

Route::get('/login', fn() => view('login'))->name('login');

Route::get('/auth/azure', function () {
    return Socialite::driver('azure')->stateless()->redirect();
});

Route::get('/auth/azure/callback', function () {
    $azureUser = Socialite::driver('azure')->stateless()->user();
    $emailLower = strtolower(trim((string) $azureUser->getEmail()));

    if (BatchUser::count() === 0) {
        BatchUser::create([
            'name'         => 'chatboteams',
            'email'        => 'chatboteams@sanfer.com.mx',
            'role'         => 'Administrador',
            'is_protected' => true,
        ]);

        BatchUser::create([
            'name'         => 'Brenda Campos Valadez',
            'email'        => 'brenda.campos@sanfer.com.mx',
            'role'         => 'Administrador',
            'is_protected' => false,
        ]);
    }

    // Solo permitir acceso a usuarios previamente dados de alta por un Administrador en batch_users
    $registeredBatchUser = BatchUser::whereRaw('LOWER(email) = ?', [$emailLower])->first();

    if (!$registeredBatchUser) {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')
            ->with('error', "Acceso restringido: La cuenta ({$emailLower}) no está dada de alta. Solicita tu registro a un Administrador.");
    }

    $user = User::updateOrCreate(
        ['email' => $emailLower],
        [
            'name'     => $azureUser->getName() ?: $registeredBatchUser->name,
            'azure_id' => $azureUser->getId(),
            'avatar'   => $azureUser->getAvatar(),
        ]
    );

    Auth::login($user);

    return redirect('/dashboard');
});

Route::middleware(['auth', \App\Http\Middleware\EnsureBatchUserRegistered::class])->group(function () {
    Route::get('/dashboard', [BatchRecordController::class, 'index'])->name('dashboard');
    Route::get('/seleccion', [BatchRecordController::class, 'seleccion'])->name('batches.seleccion');
    Route::get('/fso/orders', [BatchRecordController::class, 'fsoOrders'])->name('batches.fso_orders');
    Route::post('/batches', [BatchRecordController::class, 'store'])->name('batches.store');
    Route::post('/batches/approve', [BatchRecordController::class, 'approve'])->name('batches.approve');
    Route::get('/batches/{batch}/edit', [BatchRecordController::class, 'edit'])->name('batches.edit');
    Route::post('/batches/{batch}', [BatchRecordController::class, 'update'])->name('batches.update');
    Route::get('/batches/{batch}/print', [BatchRecordController::class, 'printView'])->name('batches.print');
    Route::delete('/batches/{batch}', [BatchRecordController::class, 'destroy'])->name('batches.destroy');

    // Rutas SQL Server para Gestión de Roles y Usuarios (tabla batch_users)
    Route::post('/roles/users', [BatchRecordController::class, 'storeRoleUser'])->name('roles.users.store');
    Route::put('/roles/users/{batchUser}', [BatchRecordController::class, 'updateRoleUser'])->name('roles.users.update');
    Route::delete('/roles/users/{batchUser}', [BatchRecordController::class, 'destroyRoleUser'])->name('roles.users.destroy');
});

Route::get('/auth/callback', function () {
    // Redirige internamente al handler correcto con los parámetros
    return redirect('/auth/azure/callback?' . request()->getQueryString());
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');