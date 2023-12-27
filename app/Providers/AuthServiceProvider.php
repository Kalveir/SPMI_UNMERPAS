<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\bookmanual;
use App\Models\bookstandar;
use App\Models\indikator;

use App\Policies\AksesPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\App;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\indikator' => 'App\Policy\AksesPolicy',
        Bookstandar::class => AksesPolicy::class,
        Indikator::class => AksesPolicy::class,
        Bookmanual::class => AksesPolicy::class,


    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
