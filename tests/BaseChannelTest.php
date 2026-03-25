<?php

use Aerni\SocialLinks\Channels\BaseChannel;

it('returns the channel name from the class basename', function () {
    $channel = new ProfileOnlyChannel;

    expect($channel->name())->toBe('ProfileOnlyChannel');
});

it('returns the handle as lowercase name', function () {
    $channel = new ProfileOnlyChannel;

    expect($channel->handle())->toBe('profileonlychannel');
});

it('returns a profile url', function () {
    $channel = (new ProfileOnlyChannel)->params(collect(['handle' => 'johndoe']));

    expect($channel->profileUrl())->toBe('https://example.com/johndoe');
});

it('returns null for profile url when no profile base url is set', function () {
    $channel = new ShareOnlyChannel;

    expect($channel->profileUrl())->toBeNull();
});

it('returns a share url', function () {
    $channel = (new ShareOnlyChannel)->params(collect(['url' => 'https://mysite.com']));

    expect($channel->shareUrl())->toBe('https://share.example.com?url=https%3A%2F%2Fmysite.com');
});

it('returns null for share url when no share base url is set', function () {
    $channel = new ProfileOnlyChannel;

    expect($channel->shareUrl())->toBeNull();
});

it('decodes share url query when encoding is disabled', function () {
    $channel = (new DecodedShareChannel)->params(collect(['url' => 'https://mysite.com']));

    expect($channel->shareUrl())->toBe('https://share.example.com?url=https://mysite.com');
});

it('allows overriding the profile base url method', function () {
    $channel = (new DynamicProfileChannel)->params(collect([
        'type' => 'org',
        'handle' => 'acme',
    ]));

    expect($channel->profileUrl())->toBe('https://example.com/org/acme');
});

it('returns params as fluent setter', function () {
    $channel = new ProfileOnlyChannel;
    $result = $channel->params(collect(['handle' => 'test']));

    expect($result)->toBe($channel);
});

it('converts to array with profile only', function () {
    $channel = (new ProfileOnlyChannel)->params(collect(['handle' => 'johndoe']));

    expect($channel->toArray())->toBe([
        'profile' => 'https://example.com/johndoe',
        'name' => 'ProfileOnlyChannel',
    ]);
});

it('converts to array with share only', function () {
    $channel = (new ShareOnlyChannel)->params(collect(['url' => 'https://mysite.com']));

    expect($channel->toArray())->toBe([
        'share' => 'https://share.example.com?url=https%3A%2F%2Fmysite.com',
        'name' => 'ShareOnlyChannel',
    ]);
});

it('registers itself via the static register method', function () {
    ProfileOnlyChannel::register();

    expect(\Aerni\SocialLinks\Facades\Channel::find('profileonlychannel'))->toBeInstanceOf(ProfileOnlyChannel::class);
});

it('converts to array with both profile and share', function () {
    $channel = (new FullChannel)->params(collect([
        'handle' => 'johndoe',
        'url' => 'https://mysite.com',
    ]));

    expect($channel->toArray())->toBe([
        'profile' => 'https://example.com/johndoe',
        'share' => 'https://share.example.com?url=https%3A%2F%2Fmysite.com',
        'name' => 'FullChannel',
    ]);
});

class ProfileOnlyChannel extends BaseChannel
{
    protected string $profileBaseUrl = 'https://example.com';
}

class ShareOnlyChannel extends BaseChannel
{
    protected string $shareBaseUrl = 'https://share.example.com';

    protected function shareUrlParams(): array
    {
        return [
            'url' => $this->params->get('url'),
        ];
    }
}

class FullChannel extends BaseChannel
{
    protected string $profileBaseUrl = 'https://example.com';

    protected string $shareBaseUrl = 'https://share.example.com';

    protected function shareUrlParams(): array
    {
        return [
            'url' => $this->params->get('url'),
        ];
    }
}

class DecodedShareChannel extends BaseChannel
{
    protected string $shareBaseUrl = 'https://share.example.com';

    protected bool $encodeShareUrlQuery = false;

    protected function shareUrlParams(): array
    {
        return [
            'url' => $this->params->get('url'),
        ];
    }
}

class DynamicProfileChannel extends BaseChannel
{
    protected function profileBaseUrl(): string
    {
        return match ($this->params->get('type')) {
            'org' => 'https://example.com/org',
            default => 'https://example.com/user',
        };
    }
}
