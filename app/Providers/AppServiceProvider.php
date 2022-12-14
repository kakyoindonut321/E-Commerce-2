<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;


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
        Blade::directive('avatar', function ($expression) {
            return "<?php echo $expression ? '/storage/profileImg/' . $expression : URL::to('/image/user.png'); ?>";
        });    
        Blade::directive('money', function ($expression) {
            return "<?php echo '<span id='js-the-number'>Rp' . $expression . '</span>'; ?>";
        });
    }
}
