<?php

namespace Aerni\SocialLinks;

use Aerni\SocialLinks\Channels\BaseChannel;
use Aerni\SocialLinks\Channels\Facebook;
use Aerni\SocialLinks\Channels\GitHub;
use Aerni\SocialLinks\Channels\Instagram;
use Aerni\SocialLinks\Channels\LinkedIn;
use Aerni\SocialLinks\Channels\Mail;
use Aerni\SocialLinks\Channels\Pinterest;
use Aerni\SocialLinks\Channels\Telegram;
use Aerni\SocialLinks\Channels\Twitter;
use Aerni\SocialLinks\Channels\Vimeo;
use Aerni\SocialLinks\Channels\WhatsApp;
use Aerni\SocialLinks\Channels\Xing;
use Aerni\SocialLinks\Channels\YouTube;

class ChannelRegistry
{
    protected array $channels = [
        Facebook::class,
        GitHub::class,
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

    public function register(string $channel): void
    {
        if (is_subclass_of($channel, BaseChannel::class)) {
            $this->channels[] = $channel;
        }
    }

    public function find(string $channel): ?BaseChannel
    {
        return collect([...$this->channels, ...config('social-links.channels', [])])
            ->unique()
            ->map(fn (string $class) => app($class))
            ->first(fn (BaseChannel $class) => $class->handle() === $channel);
    }
}
