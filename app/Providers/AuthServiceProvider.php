<?php

namespace App\Providers;

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


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
        /*Paginator::defaultView('pagination::default');

        Gate::define('destroy-session', function (User $user, Session $session) {
            return $user->is_admin or $session->created_at < Carbon::now()->subHour();
        });
        $this->registerPolicies();
        Paginator::defaultView('pagination::bootstrap-4');

        Gate::define('destroy-service', function (User $user, Service $service) {
            return
                $user->is_admin OR
                $service->price < 1000;
        });

        Gate::define('create-service', function (User $user) {
            return true;
        });*/
    }
}
