<?php

namespace App\Providers;

use Illuminate\Database\Events\ConnectionEstablished;
use Illuminate\Database\SQLiteConnection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;

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
        //Here, we will use bootstrap 5 for pagination. so, we need to import it on AppServiceProvider.php file. let's update it.
        Paginator::useBootstrapFive();
        Blade::withoutDoubleEncoding();

        /*if ($this->app->environment('local')) {
            Mail::alwaysTo('diogo@sisconsp.com.br');
        }*/

        // ⚡ Bolt Optimization: Configure SQLite for performance (WAL mode)
        // This improves concurrency and reduces file locking contention.
        // We skip this in testing to avoid "database is locked" errors with RefreshDatabase.
        if (! $this->app->runningUnitTests()) {
            Event::listen(ConnectionEstablished::class, function (ConnectionEstablished $event) {
                if ($event->connection instanceof SQLiteConnection) {
                    $config = $event->connection->getConfig();

                    if (isset($config['journal_mode'])) {
                        $mode = $config['journal_mode'];
                        $event->connection->statement("PRAGMA journal_mode={$mode};");
                    }

                    if (isset($config['synchronous'])) {
                        $sync = $config['synchronous'];
                        $event->connection->statement("PRAGMA synchronous={$sync};");
                    }
                }
            });
        }
    }
}
