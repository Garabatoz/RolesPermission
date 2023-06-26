<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\Product;
use App\Models\Permission;
use App\Models\Project;
use App\Policies\RolePolicy;
use App\Policies\ProductPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\ProjectPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
        Product::class => ProductPolicy::class,
        Role::class => RolePolicy::class,
        Project::class => ProjectPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        if(!$this->app->routesAreCached()){
            Passport::routes();
        }
    }
}
