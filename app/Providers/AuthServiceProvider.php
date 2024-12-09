<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Item;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Pagination\Paginator;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Paginator::defaultView('pagination::bootstrap-4');

        $gate = app(Gate::class);
        $gate->define('destroy-service', function (User $user, Item $service) {
            return $user->is_admin || $service->price < 1000;
        });

        $gate->define('create-service', function (User $user) {
            return true;
        });
    }
}
