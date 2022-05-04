<?php

namespace App\Providers;

use Facade\FlareClient\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Copmposers\HelloComposer;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    //   view()->composer(
    //     'hello.index2',
    //     function ($view) {
    //       $view->with(
    //         "view_message",
    //         "composer message!"
    //       );
    //   });

      view()->composer(
        "hello.index2",
        "App\Http\Copmposers\HelloComposer"
      );
    }
}
