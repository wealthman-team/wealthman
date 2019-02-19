<?php

namespace App\Providers;

use App\Services\MobileDetectManager;
use Illuminate\View\ViewServiceProvider as BaseViewServiceProvider;

class ViewServiceProvider extends BaseViewServiceProvider
{
    /**
     * set mobile path in config
     */
    public function register()
    {
        //Инициализация должна быть до запуска parent::register()
        $this->app->make(MobileDetectManager::class);
        parent::register();
    }
}
