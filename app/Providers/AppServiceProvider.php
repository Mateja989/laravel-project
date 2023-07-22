<?php

namespace App\Providers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Tag;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $answersObj = new Answer();


        Paginator::useBootstrapFour();
        View::share('topuser',$answersObj->getMostAnswersUser());
        View::share('topics',Topic::all());
        View::share('tags',Tag::all());
    }
}
