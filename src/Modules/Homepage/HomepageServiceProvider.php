<?php

namespace Module\Homepage;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Support\RegistersModule;
use Module\Homepage\Web\HomepageController;

final class HomepageServiceProvider extends ServiceProvider
{
    use RegistersModule;

    public function boot(): void
    {
        $this->registerRoutes();
        $this->registerWebModule();
    }

    public function routes(Router $router): void
    {
        $router->get('/', [HomepageController::class, 'index'])->name('index');
    }
}
