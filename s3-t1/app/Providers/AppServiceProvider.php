<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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
        //


        /**
         * Перекрываем директиву Blade @json для добавления опции JSON_INVALID_UTF8_SUBSTITUTE
         *
         * @see \Illuminate\View\Compilers\Concerns\CompilesJson
         */
        Blade::directive('json', function ($expression) {

            $encodingOptions = JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_INVALID_UTF8_SUBSTITUTE;

            if (Str::startsWith($expression, '(')) {
                $expression = substr($expression, 1, -1);
            }

            $parts = explode(',', $expression);

            $options = isset($parts[1]) ? trim($parts[1]) : $encodingOptions;

            $depth = isset($parts[2]) ? trim($parts[2]) : 512;

            return "<?php echo json_encode($parts[0], $options, $depth) ?>";
        });
    }
}
