<?php

namespace App\Providers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
//        try {
//            DB::connection()->getPdo();
//        } catch (\Exception $e) {
//            die("Could not connect to the database.  Please Create DB with following settings:"
//                    . "</br>Server:localhost</br>"
//                    . "Database:qman</br>"
//                    . "User:qman</br>"
//                    . "Password:qman123");
//        }
        
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
