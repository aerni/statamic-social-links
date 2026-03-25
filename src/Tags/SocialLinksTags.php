<?php

namespace Aerni\SocialLinks\Tags;

use Aerni\SocialLinks\Facades\Channel;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Request;
use Statamic\Support\Str;
use Statamic\Tags\Tags;

class SocialLinksTags extends Tags
{
    protected static $handle = 'social';

    public function wildcard(): string|array|null
    {
        $data = $this->resolve();

        if ($this->isPair) {
            return $data;
        }

        return Arr::get($data, Str::after($this->method, ':'));
    }

    public function profile(): ?string
    {
        return Arr::get($this->resolve(), 'profile');
    }

    public function share(): ?string
    {
        return Arr::get($this->resolve(), 'share');
    }

    public function name(): ?string
    {
        return Arr::get($this->resolve(), 'name');
    }

    protected function resolve(): ?array
    {
        $channel = $this->params->get('channel') ?? Str::before($this->method, ':');

        $this->params['url'] = $this->params->get('url') ?? Request::fullUrl();

        return Channel::find($channel)
            ?->params($this->params)
            ->toArray();
    }
}
