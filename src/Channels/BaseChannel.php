<?php

namespace Aerni\SocialLinks\Channels;

use Aerni\SocialLinks\Facades\Channel;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use Statamic\Facades\URL;

abstract class BaseChannel implements Arrayable
{
    protected Collection $params;

    protected string $profileBaseUrl;

    protected string $shareBaseUrl;

    protected bool $encodeShareUrlQuery = true;

    public function __construct()
    {
        $this->params = collect();
    }

    public function name(): string
    {
        return class_basename($this);
    }

    public function handle(): string
    {
        return strtolower($this->name());
    }

    public function params(Collection $params): static
    {
        $this->params = $params;

        return $this;
    }

    public function toArray(): array
    {
        return array_filter([
            'profile' => $this->profileUrl(),
            'share' => $this->shareUrl(),
            'name' => $this->name(),
        ]);
    }

    public static function register(): void
    {
        Channel::register(static::class);
    }

    public function profileUrl(): ?string
    {
        if (! $this->hasProfileUrl()) {
            return null;
        }

        return URL::assemble($this->profileBaseUrl(), $this->params->get('handle'));
    }

    public function shareUrl(): ?string
    {
        if (! $this->hasShareUrl()) {
            return null;
        }

        $query = http_build_query($this->shareUrlParams());

        if (! $this->encodeShareUrlQuery) {
            $query = urldecode($query);
        }

        return $this->shareBaseUrl().'?'.$query;
    }

    protected function hasProfileUrl(): bool
    {
        return isset($this->profileBaseUrl) || (new \ReflectionMethod($this, 'profileBaseUrl'))->getDeclaringClass()->getName() !== self::class;
    }

    protected function hasShareUrl(): bool
    {
        return isset($this->shareBaseUrl) || (new \ReflectionMethod($this, 'shareBaseUrl'))->getDeclaringClass()->getName() !== self::class;
    }

    protected function profileBaseUrl(): string
    {
        return $this->profileBaseUrl;
    }

    protected function shareBaseUrl(): string
    {
        return $this->shareBaseUrl;
    }

    protected function shareUrlParams(): array
    {
        return [];
    }
}
