<?php

namespace App\Providers;

use App\Http\Controllers\ProfileController;
use App\Idea;
use App\Policies\IdeaPolicy;
use App\Policies\ProfilePolicy;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Idea::class => IdeaPolicy::class,
        User::class => ProfilePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
