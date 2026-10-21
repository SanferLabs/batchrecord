<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use SocialiteProviders\Manager\SocialiteWasCalled;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Los listeners de eventos de tu aplicación.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        // 🔐 Este es el evento necesario para habilitar Azure como driver
        SocialiteWasCalled::class => [
            'SocialiteProviders\\Azure\\AzureExtendSocialite@handle',
        ],
    ];

    /**
     * ¿Debería Laravel descubrir automáticamente eventos y listeners?
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }

    /**
     * Registra cualquier evento adicional.
     */
    public function boot(): void
    {
        //
    }
}
