<?php

namespace App\Providers;

use App\Models\TradeInfo;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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
     * @throws \ErrorException
     */
    public function boot()
    {
        if (DB::connection()->getDatabaseName()){
            if (Schema::hasTable('trade_infos') == 0){
                echo 'Migrating database...';
                Artisan::call('migrate');
            }
            if (TradeInfo::all()->count() === 0) {
                echo 'Wait... Loading json data for the first time.';
                Artisan::call('json:db --filename=stock_market_data.json');
            }

        } else {
            throw new \ErrorException('Please connection the database first.');
        }


    }
}
