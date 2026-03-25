<?php

namespace Aerni\SocialLinks\Facades;

use Aerni\SocialLinks\ChannelRegistry;
use Illuminate\Support\Facades\Facade;

/**
 * @see \Aerni\SocialLinks\ChannelRegistry
 *
 * @method static void register(string $channel)
 * @method static \Aerni\SocialLinks\Channels\BaseChannel|null find(string $channel)
 */
class Channel extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ChannelRegistry::class;
    }
}
