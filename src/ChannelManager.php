<?php

namespace Aerni\SocialLinks;

use Aerni\SocialLinks\Channels\Mail;
use Aerni\SocialLinks\Channels\Xing;
use Aerni\SocialLinks\Channels\Vimeo;
use Aerni\SocialLinks\Channels\Channel;
use Aerni\SocialLinks\Channels\Twitter;
use Aerni\SocialLinks\Channels\YouTube;
use Aerni\SocialLinks\Channels\Facebook;
use Aerni\SocialLinks\Channels\LinkedIn;
use Aerni\SocialLinks\Channels\Telegram;
use Aerni\SocialLinks\Channels\WhatsApp;
use Aerni\SocialLinks\Channels\Instagram;
use Aerni\SocialLinks\Channels\Pinterest;

class ChannelManager
{
    protected array $channels = [
        Facebook::class,
        Instagram::class,
        LinkedIn::class,
        Mail::class,
        Pinterest::class,
        Telegram::class,
        Twitter::class,
        Vimeo::class,
        WhatsApp::class,
        Xing::class,
        YouTube::class,
    ];

    public static function find(string $channel): ?Channel
    {
        return collect((new static)->channels)
            ->map(fn ($class) => app($class))
            ->first(fn ($class) => $class->handle() === $channel);
    }
}
