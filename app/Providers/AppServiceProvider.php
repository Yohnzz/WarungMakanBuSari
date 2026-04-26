<?php

namespace App\Providers;

use App\Interface\KategoriInterface;
use App\Interface\MenuInterface;
use App\Repository\KategoriRepository;
use App\Repository\MenuRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public $bindings = [
        KategoriInterface::class => KategoriRepository::class,
        MenuInterface::class => MenuRepository::class,
    ];

    public function register(): void
    {
        foreach ($this->bindings as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
