<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Joselfonseca\LaravelTactician\CommandBusInterface;

class CommandBusServiceProvider extends ServiceProvider
{
    /**
     * @var array|string[]
     */
    private array $commands = [

    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $commands = $this->commands;
        $this->app->extend(CommandBusInterface::class, static function ($service) use ($commands) {
            foreach ($commands as $command => $handler) {
                $service->addHandler($command, $handler);
            }

            return $service;
        });
    }
}
