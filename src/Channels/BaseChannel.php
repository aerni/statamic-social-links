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

    final public function handle(): string
    {
        return strtolower($this->name());
    }

    public function params(Collection $params): static
    {
        $this->params = $this->params->merge($params);

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
        $baseUrl = $this->profileBaseUrl();
        $handle = $this->params->get('handle');

        if (! $baseUrl || ! $handle) {
            return null;
        }

        return URL::assemble($baseUrl, $handle);
    }

    public function shareUrl(): ?string
    {
        if (! $baseUrl = $this->shareBaseUrl()) {
            return null;
        }

        if (! $this->params->has('url')) {
            $this->params->put('url', request()->fullUrl());
        }

        $query = http_build_query(array_filter($this->shareUrlParams()));

        if (! $this->encodeShareUrlQuery) {
            $query = urldecode($query);
        }

        return $query ? "{$baseUrl}?{$query}" : null;
    }

    protected function profileBaseUrl(): ?string
    {
        return isset($this->profileBaseUrl) ? $this->profileBaseUrl : null;
    }

    protected function shareBaseUrl(): ?string
    {
        return isset($this->shareBaseUrl) ? $this->shareBaseUrl : null;
    }

    protected function shareUrlParams(): array
    {
        return [];
    }
}
