<?php
namespace App\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;

class BladeExtensionProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::extend(function($value) {
            return preg_replace('/\{\?(.+)\?\}/', '<?php ${1} ?>', $value);
        });
    }

    /**
     * Register
     *
     * @return void
     */
    public function register()
    {
    }
}
