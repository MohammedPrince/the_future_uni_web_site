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

        // <a href="{{ $url }}" @ext($url)> opens links to other websites in a new tab.
        Blade::directive('ext', fn ($url) => "<?php echo \\App\\Support\\Links::target({$url}); ?>");

        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
