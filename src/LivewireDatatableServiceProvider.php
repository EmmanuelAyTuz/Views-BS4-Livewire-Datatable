<?php

namespace Emmanuel\LivewireDatatableBs4;

use Illuminate\Support\ServiceProvider as Provider;

final class LivewireDatatableServiceProvider extends Provider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //Load the views
        $this->loadViewsFrom(__DIR__ . '/../resources/views/bootstrap', 'LivewireDatatableBs4');
        //Publish views
        $this->publishes([
            __DIR__ . '/../resources/views/bootstrap' => resource_path('views/livewire/datatables'),
        ], 'livewire-datatable-bs4');

        //Load language translations...
        $this->loadTranslationsFrom(resource_path('lang'), 'LivewireDatatableBs4');
        //Publish translations
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/LivewireDatatableBs4'),
        ], 'livewire-datatable-bs4');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        // 
    }
}
