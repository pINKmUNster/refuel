<?php

namespace Module\Fuel;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Support\RegistersModule;
use Module\Vehicle\Web\VehicleController;

final class FuelServiceProvider extends ServiceProvider
{
    use RegistersModule;

    public function boot(): void
    {
        $this->registerRoutes();
        $this->registerWebModule();
    }

    public function routes(Router $router): void
    {
        $router->get('/vehicle', [VehicleController::class, 'index'])->name('index');
    }
}
