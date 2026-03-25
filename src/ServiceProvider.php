<?php

namespace Aerni\SocialLinks;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    public function register(): void
    {
        parent::register();

        $this->app->singleton(ChannelRegistry::class);
    }
}
