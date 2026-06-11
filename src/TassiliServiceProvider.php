<?php

namespace Tassili\Admin;

use Illuminate\Support\ServiceProvider;

class TassiliServiceProvider extends ServiceProvider
{
   
    public function register(): void
    {
      $this->publishes([
            __DIR__.'/../config/tassili.php' => config_path('tassili.php'),
        ], 'tassili-config');

        $this->mergeConfigFrom(
            __DIR__.'/../config/tassili.php', 'tassili'
        );
    }

   
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

         $this->commands([
            \Tassili\Admin\Commands\CreateUser::class,
            \Tassili\Admin\Commands\CrudCommand::class,
            \Tassili\Admin\Commands\TassiliCreator::class,
            \Tassili\Admin\Commands\WizardCommand::class,
            \Tassili\Admin\Commands\CreateCollection::class,
        ]);
    }
}