<?php

namespace App\Providers;

use App\Models\Itinerary;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('itineraryOwner', fn(User $user, Itinerary $itinerary) => $itinerary->user_id == $user->id);
    }
}
