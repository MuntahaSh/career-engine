<?php

use App\Http\Controllers\AIProjectController;
use App\Http\Controllers\DashboardController;
use App\Models\Project;
use App\Models\Certificate;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\View\Components\project\CreateUpdateProject as ProjectForm;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\PublicPortfolioController;
use Illuminate\Support\Facades\Http;

// Load authentication routes if present (avoid calling Fortify::routes() which may not be available)
if (file_exists(__DIR__ . '/auth.php')) {
    require __DIR__ . '/auth.php';
}


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile');

    Route::put('/profile/update', [ProfileController::class, 'update'])
        ->name('profile.update');


    Route::post(
        '/profile/generate-bio',
        [ProfileController::class, 'generateBio']
    )->name('profile.generate-bio');




    Route::post(
        '/notifications/read',
        function () {

            auth()
                ->user()
                ->unreadNotifications
                ->markAsRead();


            return response()->json([
                'success' => true
            ]);
        }
    )
        ->name('notifications.read');




    Route::resource(
        'projects',
        ProjectController::class
    )
        ->except([
            'show'
        ]);




    Route::post(
        '/projects/classify-featured',
        [
            AIProjectController::class,
            'classify'
        ]
    )

        ->name('projects.ai.featured');




    Route::middleware('auth')
        ->group(function () {


            Route::get(
                '/certificates',
                [CertificateController::class, 'index']
            )
                ->name('certificates');



            Route::get(
                '/certificates/create',
                [CertificateController::class, 'create']
            )
                ->name('certificates.create');



            Route::post(
                '/certificates',
                [CertificateController::class, 'store']
            )
                ->name('certificates.store');



            Route::get(
                '/certificates/{certificate}',
                [CertificateController::class, 'show']
            )
                ->name('certificates.show');



            Route::get(
                '/certificates/{certificate}/edit',
                [CertificateController::class, 'edit']
            )
                ->name('certificates.edit');



            Route::put(
                '/certificates/{certificate}',
                [CertificateController::class, 'update']
            )
                ->name('certificates.update');



            Route::delete(
                '/certificates/{certificate}',
                [CertificateController::class, 'destroy']
            )
                ->name('certificates.destroy');
        });


    Route::get('/skills', function () {
        return view('skill');
    })->name('skills');
    Route::get('/skills/create', function () {
        return view('addSkill');
    })->name('skills.create');

    Route::get('/experiences', function () {
        return view('experience');
    })->name('experiences');


    Route::get('/experiences/create', function () {
        return view('addExperience');
    })->name('experiences.create');
});


Route::get(
    '/portfolio/{username}',
    [PublicPortfolioController::class,'show']
)
->name('portfolio.show');







