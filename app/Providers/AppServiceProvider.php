<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        Blade::directive('admin', function ()
        {
            return "<?php if(auth()->check() && auth()->user()->role_id==1): ?>";
        });
        Blade::directive('endadmin', function ()
        {
            return "<?php endif; ?>";
        });
        Blade::directive('middle', function ()
        {
            return "<?php if(auth()->check() && auth()->user()->role_id<=2): ?>";
        });
        Blade::directive('endmiddle', function ()
        {
            return "<?php endif; ?>";
        });
    }
}
