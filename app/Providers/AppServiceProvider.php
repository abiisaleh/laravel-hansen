<?php

namespace App\Providers;

use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Http\Request;

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
        Model::unguard();

        if (str_contains(url()->current(), 'file-manager'))
            FilamentAsset::register([
                Css::make('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'),
                Css::make('bootstrap-icon', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css'),
                Css::make('custom-style', asset('vendor/file-manager/css/file-manager.css')),
                Js::make('custom-script', asset('vendor/file-manager/js/file-manager.js')),
            ]);
    }
}
