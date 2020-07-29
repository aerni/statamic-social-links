<?php

namespace Aerni\SocialLinks;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $tags = [
        SocialLinksTags::class,
    ];
}
