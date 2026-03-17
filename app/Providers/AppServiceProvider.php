<?php

 namespace App\Providers;

 use Illuminate\Support\ServiceProvider;
//  use Laravel\Prompts\Prompt;

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
        //  Prompt::interactive(false);
     }
 }
