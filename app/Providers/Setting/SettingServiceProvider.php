<?php

namespace App\Providers\Setting;

use Illuminate\Support\ServiceProvider;
use DB, App;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        try
        {
            $setting = DB::table('settings')->pluck('value', 'name');
        }
        catch (Exception $e)
        {
            $setting = false;
        }

        App::singleton('setting', function() use($setting)
        {            
            return new Setting($setting);
        });
    }
}
