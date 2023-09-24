<?php

namespace TomatoPHP\TomatoSupport;

use Illuminate\Support\ServiceProvider;
use TomatoPHP\TomatoAdmin\Facade\TomatoMenu;
use TomatoPHP\TomatoAdmin\Services\Contracts\Menu;


class TomatoSupportServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register generate command
        $this->commands([
           \TomatoPHP\TomatoSupport\Console\TomatoSupportInstall::class,
        ]);

        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/tomato-support.php', 'tomato-support');

        //Publish Config
        $this->publishes([
           __DIR__.'/../config/tomato-support.php' => config_path('tomato-support.php'),
        ], 'tomato-support-config');

        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        //Publish Migrations
        $this->publishes([
           __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'tomato-support-migrations');
        //Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tomato-support');

        //Publish Views
        $this->publishes([
           __DIR__.'/../resources/views' => resource_path('views/vendor/tomato-support'),
        ], 'tomato-support-views');

        //Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tomato-support');

        //Publish Lang
        $this->publishes([
           __DIR__.'/../resources/lang' => app_path('lang/vendor/tomato-support'),
        ], 'tomato-support-lang');

        //Register Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

    }

    public function boot(): void
    {
        //you boot methods here
        TomatoMenu::register([
            Menu::make()
                ->group(__('Support Center'))
                ->label(__('Tickets'))
                ->icon('bx bx-sticker')
                ->route('admin.tickets.index'),
            Menu::make()
                ->group(__('Support Center'))
                ->label(__('FAQ'))
                ->icon('bx bx-help-circle')
                ->route('admin.questions.index'),
            Menu::make()
                ->group(__('Support Center'))
                ->label(__('Pages'))
                ->icon('bx bx-file')
                ->route('admin.pages.index')
        ]);
    }
}
