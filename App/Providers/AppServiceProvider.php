<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Contracts\AIProvider;
use App\Services\AI\Providers\GeminiProvider;
use App\Services\AI\Providers\GroqProvider;
use App\Services\AI\Providers\OpenAIProvider;
use App\Models\User;
use App\Observers\UserObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
    AIProvider::class,
    GroqProvider::class
);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
            Fortify::loginView(function () {
        return view('auth.login');
    });

    Fortify::registerView(function () {
        return view('auth.register');
    });

        User::observe(UserObserver::class);

    }
}
