<?php

use Aerni\SocialLinks\Channels\BaseChannel;
use Aerni\SocialLinks\Channels\Facebook;
use Aerni\SocialLinks\Facades\Channel;

it('finds a channel by handle', function () {
    $channel = Channel::find('facebook');

    expect($channel)->toBeInstanceOf(Facebook::class);
});

it('returns null for an unknown channel', function () {
    expect(Channel::find('nonexistent'))->toBeNull();
});

it('registers a custom channel', function () {
    Channel::register(TestChannel::class);

    $channel = Channel::find('testchannel');

    expect($channel)->toBeInstanceOf(TestChannel::class);
});

it('ignores registration of non-channel classes', function () {
    Channel::register(stdClass::class);

    expect(Channel::find('stdclass'))->toBeNull();
});

it('registers channels from config', function () {
    config(['social-links.channels' => [TestChannel::class]]);

    expect(Channel::find('testchannel'))->toBeInstanceOf(TestChannel::class);
});

it('finds all default channels', function () {
    $handles = collect([
        'facebook', 'github', 'instagram', 'linkedin', 'mail',
        'pinterest', 'telegram', 'twitter', 'vimeo', 'whatsapp',
        'xing', 'youtube',
    ]);

    $handles->each(fn (string $handle) => expect(Channel::find($handle))->toBeInstanceOf(BaseChannel::class));
});

class TestChannel extends BaseChannel
{
    protected string $profileBaseUrl = 'https://test.com';
}
