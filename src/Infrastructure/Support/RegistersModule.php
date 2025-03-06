<?php

namespace Infrastructure\Support;

use Hybridly\Hybridly;
use Illuminate\Contracts\Foundation\CachesConfiguration;
use Illuminate\Contracts\Foundation\CachesRoutes;

/**
 * Simplifies repetitive code in service providers.
 */
trait RegistersModule
{
    public static function getNamespace(): string
    {
        return str(static::class)->classBasename()->before('ServiceProvider')->kebab();
    }

    protected function registerWebModule(): void
    {
        /** @var Hybridly */
        $hybridly = $this->app->make(Hybridly::class);

        $trace = debug_backtrace(
            options: \DEBUG_BACKTRACE_IGNORE_ARGS,
            limit: 1,
        );

        $hybridly->loadModuleFrom(\dirname($trace[0]['file']) . '/Web', static::getNamespace(), deep: false);
        $hybridly->loadTypeScriptFilesFrom(\dirname($trace[0]['file']) . '/Web/utils', deep: false);
    }

    protected function registerRoutes(string|array $middleware = ['web']): void
    {
        if ($this->app instanceof CachesRoutes && $this->app->routesAreCached()) {
            return;
        }

        $trace = debug_backtrace(
            options: \DEBUG_BACKTRACE_IGNORE_ARGS,
            limit: 1,
        );

        /** @var Router */
        $router = $this->app->make('router');
        $router
            ->middleware($middleware)
            ->name(static::getNamespace() . '.')
            ->group(match (method_exists($this, 'routes')) {
                true => fn () => $this->routes($router),
                false => \dirname($trace[0]['file']) . '/routes.php'
            });
    }

    /**
     * Registers the `config.php` file in the same directory as the caller.
     */
    protected function registerConfig(?string $key = null): void
    {
        $trace = debug_backtrace(
            options: \DEBUG_BACKTRACE_IGNORE_ARGS,
            limit: 1,
        );

        if (!($this->app instanceof CachesConfiguration && $this->app->configurationIsCached())) {
            $config = $this->app->make('config');
            $key ??= static::getNamespace();

            $config->set($key, array_merge(
                $config->get($key, default: []),
                require \dirname($trace[0]['file']) . '/config.php',
            ));
        }
    }
}
