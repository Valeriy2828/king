<?php

namespace App\Providers;


use Backpack\LangFileManager\app\Models\Language;
use Backpack\Settings\app\Models\Setting;
use Illuminate\Support\ServiceProvider;
use App\User;
use Illuminate\Support\Facades\View;
use \Backpack\MenuCRUD\app\Models\MenuItem;
use Jenssegers\Date\Date;


use Auth;
use Session;
use Blade;
use DB;
use App;

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

        Date::setlocale(config('app.locale'));

        View::composer('*', function ($view) {

            //$sLocal = \App::getLocale();
            $en = \App::isLocale('en');
            $ru = \App::isLocale('ru');

            $view->with('user', Auth::user())
                 ->with('en', $en)
                 ->with('ru', $ru);
        });


       Blade::directive('set',function ($exp){
            list($name,$val) = explode(',',$exp);

            return "<?php $name = $val ?>";
       });

       DB::listen(function ($query){
           // echo '<h1>'.$query->sql.'</h1>';
       });

    }


}
