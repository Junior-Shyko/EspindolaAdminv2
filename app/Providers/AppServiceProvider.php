<?php

namespace App\Providers;

use App\Models\Survey;
use App\Repository\Survey\SurveyRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Repository\Survey\SurveyRepositoryInterface',
            'App\Repository\Survey\SurveyRepository'
        );

        $this->app->bind(
            'App\Repository\Survey\SurveyRepositoryInterface',
            function() {
                return new SurveyRepository(new Survey());
            }
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
