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
        $this->params = $this->defaultParams();
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

    protected function defaultParams(): Collection
    {
        return collect([
            'url' => request()->fullUrl(),
        ]);
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
        return ($baseUrl = $this->profileBaseUrl())
            ? URL::assemble($baseUrl, $this->params->get('handle'))
            : null;
    }

    public function shareUrl(): ?string
    {
        if (! $baseUrl = $this->shareBaseUrl()) {
            return null;
        }

        $query = http_build_query(array_filter($this->shareUrlParams()));

        if (! $this->encodeShareUrlQuery) {
            $query = urldecode($query);
        }

        return $query ? "{$baseUrl}?{$query}" : $baseUrl;
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
