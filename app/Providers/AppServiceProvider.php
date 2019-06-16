<?php

namespace App\Providers;


use App\Services\Impl\LiteratureServiceImpl;
use App\Services\Impl\TrainingQuestionServiceImpl;
use App\Services\Impl\TrainingTestServiceImpl;
use App\Services\Impl\UserServiceImpl;
use App\Services\LiteratureService;
use App\Services\TrainingQuestionService;
use App\Services\TrainingTestService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserService::class,UserServiceImpl::class);
        $this->app->bind(TrainingTestService::class,TrainingTestServiceImpl::class);
        $this->app->bind(TrainingQuestionService::class,TrainingQuestionServiceImpl::class);
        $this->app->bind(LiteratureService::class,LiteratureServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
