<?php

namespace Module\Vehicle;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Support\RegistersModule;
use Module\Vehicle\Web\VehicleController;

final class VehicleServiceProvider extends ServiceProvider
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
        $router->post('/vehicle', [VehicleController::class, 'store'])->name('store');
        $router->get('/vehicle/create', [VehicleController::class, 'create'])->name('create');
        $router->get('/vehicle/{id}', [VehicleController::class, 'show'])->name('show');
        $router->delete('/vehicle/{id}', [VehicleController::class, 'destroy'])->name('destroy');
    }
}
