<?php

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

it('generates a facebook profile url', function () {
    $channel = (new Facebook)->params(collect(['handle' => 'johndoe']));

    expect($channel->profileUrl())->toBe('https://www.facebook.com/johndoe');
});

it('generates a facebook share url', function () {
    $channel = (new Facebook)->params(collect([
        'url' => 'https://mysite.com',
        'text' => 'Check this out',
    ]));

    expect($channel->shareUrl())->toContain('facebook.com/sharer/sharer.php')
        ->toContain('u=https%3A%2F%2Fmysite.com')
        ->toContain('quote=Check+this+out');
});

it('generates a github profile url', function () {
    $channel = (new GitHub)->params(collect(['handle' => 'johndoe']));

    expect($channel->profileUrl())->toBe('https://github.com/johndoe');
});

it('generates an instagram profile url', function () {
    $channel = (new Instagram)->params(collect(['handle' => 'johndoe']));

    expect($channel->profileUrl())->toBe('https://www.instagram.com/johndoe');
});

it('generates a linkedin profile url for a person', function () {
    $channel = (new LinkedIn)->params(collect(['handle' => 'johndoe']));

    expect($channel->profileUrl())->toBe('https://www.linkedin.com/in/johndoe');
});

it('generates a linkedin profile url for a company', function () {
    $channel = (new LinkedIn)->params(collect([
        'handle' => 'acme',
        'type' => 'company',
    ]));

    expect($channel->profileUrl())->toBe('https://www.linkedin.com/company/acme');
});

it('generates a linkedin share url', function () {
    $channel = (new LinkedIn)->params(collect([
        'url' => 'https://mysite.com',
        'title' => 'My Post',
    ]));

    expect($channel->shareUrl())->toContain('linkedin.com/shareArticle')
        ->toContain('mini=true')
        ->toContain('url=https%3A%2F%2Fmysite.com')
        ->toContain('title=My+Post');
});

it('generates a mail share url', function () {
    $channel = (new Mail)->params(collect([
        'to' => 'test@example.com',
        'subject' => 'Hello World',
        'url' => 'https://mysite.com',
    ]));

    $url = $channel->shareUrl();

    expect($url)->toStartWith('mailto:test@example.com')
        ->and($url)->toContain('subject=Hello World')
        ->and($url)->toContain('body=https://mysite.com');
});

it('generates a pinterest profile url', function () {
    $channel = (new Pinterest)->params(collect(['handle' => 'johndoe']));

    expect($channel->profileUrl())->toBe('https://www.pinterest.com/johndoe');
});

it('generates a pinterest share url', function () {
    $channel = (new Pinterest)->params(collect([
        'url' => 'https://mysite.com',
        'image' => 'https://mysite.com/image.jpg',
    ]));

    expect($channel->shareUrl())->toContain('pinterest.com/pin/create/button')
        ->toContain('url=https%3A%2F%2Fmysite.com')
        ->toContain('media=https%3A%2F%2Fmysite.com%2Fimage.jpg');
});

it('generates a telegram share url', function () {
    $channel = (new Telegram)->params(collect([
        'url' => 'https://mysite.com',
        'text' => 'Check this out',
    ]));

    expect($channel->shareUrl())->toContain('t.me/share/url')
        ->toContain('url=https%3A%2F%2Fmysite.com')
        ->toContain('text=Check+this+out');
});

it('generates a twitter profile url', function () {
    $channel = (new Twitter)->params(collect(['handle' => 'johndoe']));

    expect($channel->profileUrl())->toBe('https://www.twitter.com/johndoe');
});

it('generates a twitter share url', function () {
    $channel = (new Twitter)->params(collect([
        'url' => 'https://mysite.com',
        'text' => 'Check this out',
        'handle' => '@johndoe',
    ]));

    expect($channel->shareUrl())->toContain('twitter.com/intent/tweet')
        ->toContain('url=https%3A%2F%2Fmysite.com')
        ->toContain('text=Check+this+out')
        ->toContain('via=johndoe');
});

it('generates a vimeo profile url', function () {
    $channel = (new Vimeo)->params(collect(['handle' => 'johndoe']));

    expect($channel->profileUrl())->toBe('https://www.vimeo.com/johndoe');
});

it('generates a whatsapp share url', function () {
    $channel = (new WhatsApp)->params(collect(['url' => 'https://mysite.com']));

    expect($channel->shareUrl())->toContain('whatsapp://send')
        ->toContain('text=https%3A%2F%2Fmysite.com');
});

it('generates a xing profile url', function () {
    $channel = (new Xing)->params(collect(['handle' => 'johndoe']));

    expect($channel->profileUrl())->toBe('https://www.xing.com/profile/johndoe');
});

it('generates a xing share url', function () {
    $channel = (new Xing)->params(collect(['url' => 'https://mysite.com']));

    expect($channel->shareUrl())->toContain('xing.com/spi/shares/new')
        ->toContain('url=https%3A%2F%2Fmysite.com');
});

it('generates a youtube profile url', function () {
    $channel = (new YouTube)->params(collect(['handle' => 'johndoe']));

    expect($channel->profileUrl())->toBe('https://www.youtube.com/johndoe');
});

it('returns null for share on profile-only channels', function () {
    expect((new GitHub)->shareUrl())->toBeNull();
    expect((new Instagram)->shareUrl())->toBeNull();
    expect((new Vimeo)->shareUrl())->toBeNull();
    expect((new YouTube)->shareUrl())->toBeNull();
});

it('returns null for profile on share-only channels', function () {
    expect((new Mail)->profileUrl())->toBeNull();
    expect((new Telegram)->profileUrl())->toBeNull();
    expect((new WhatsApp)->profileUrl())->toBeNull();
});
