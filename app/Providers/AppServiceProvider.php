<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        // @img('client/img/x.jpg') prints the fastest available URL of that file.
        Blade::directive('img', fn ($path) => "<?php echo e(\\App\\Support\\Media::url({$path})); ?>");

        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
