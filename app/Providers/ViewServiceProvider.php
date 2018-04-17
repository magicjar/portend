<?php

namespace App\Providers;

use Illuminate\View\FileViewFinder;
use Illuminate\View\ViewServiceProvider as BaseViewServiceProvider;

class ViewServiceProvider extends BaseViewServiceProvider
{
    public function registerViewFinder()
    {
        $this->app->bind('view.finder', function($app){

            return new FileViewFinder(
                // Dynamic View Path / Change view path here
                $app['files'], $app->make('setting')->getThemePaths()
            );

        });
    }
}
