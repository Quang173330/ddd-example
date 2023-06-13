<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Shiring\Application\Post\Repository\PostRepositoryInterface;
use Shiring\Infrastructure\Application\Repository\Post\MysqlPostRepository;

class DDDRepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var array|string[]
     */
    private array $repositories = [
        PostRepositoryInterface::class => MysqlPostRepository::class,
        \Shiring\Domain\Post\Repository\PostRepositoryInterface::class => \Shiring\Infrastructure\Persistence\Mysql\Post\MysqlPostRepository::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $k => $val) {
            $this->app->bind($k, $val);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
