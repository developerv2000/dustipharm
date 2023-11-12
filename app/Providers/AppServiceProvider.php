<?php

namespace App\Providers;

use App\Models\Drugstore;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    View::composer('components.drugstores-map', function ($view) {
      $view->with('drugstores', Drugstore::all());
    });

    View::composer(['dashboard.*'], function ($view) {
      $view->with('route', Route::currentRouteName())
        ->with('modelTag', getModelTag());
    });
  }
}
