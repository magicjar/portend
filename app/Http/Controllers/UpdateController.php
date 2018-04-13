<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class UpdateController extends DashboardController
{
    /**
     * Shows update view.
     * 
     * @return View
     */
    public function update()
    {
        return view('dashboard.update');  
    }

    /**
     * Migrate database.
     * 
     * @return Redirect
     */
    public function updateSchema()
    {
        ini_set('max_execution_time', 0);

        //call artisan migrate
        try {
            Artisan::call('migrate');

        } catch (Exception $e) {

        }
        
        return redirect('/dashboard')->withSuccess('Updated succesfully!');
    }
}
