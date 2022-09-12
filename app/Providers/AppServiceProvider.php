<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

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
        Paginator::defaultView('pagination::bootstrap-4');
        View::composer(['blog','post','blog/*'], function ($view) {
            $categories = Category::where('enabled',true)->orderBy('sort','asc')->withCount(['posts' => function (Builder $query) {
                $query->where('status', 'published');
                }])->get();
            $view->with('categories',$categories);
        });
    }
}
