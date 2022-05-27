<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Agrego la puerta de acceso Gate para controlar autorización.
        //La validacion es precaria, pero sirve para el caso
        /* Gate::define('create-projects', function($user) {
        *   //return $user->email === 'leonzarate@gmail.com'; 
        *   return $user->role === 'admin'; 
        *});
        */

        //Gate::define('create-projects','App\Policies\ProjectPolicy@create');


    }
}
