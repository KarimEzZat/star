<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Company;
use App\Models\Faq;
use App\Models\Question;

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
        //
        View::share([
            'companies' => Company::all(),
            'faqs' => Faq::latest()->get(),
            'questions' => Question::latest()->get(),

        ]);
    }
}
