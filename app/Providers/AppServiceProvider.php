<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\AboutUsUserController;
use App\Models\AboutUs;
use App\Models\PaketWisata;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['user.layouts.template', 'user.homepage'], function ($view) {
            $aboutUsData = AboutUs::getAboutUsData(); // Gantilah ini sesuai dengan method yang Anda gunakan
            $view->with('aboutUsData', $aboutUsData);
        });
    }
}
