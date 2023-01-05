<?php

namespace Aerni\SocialLinks;

use Statamic\Tags\Tags;
use Statamic\Support\Str;
use Aerni\SocialLinks\Channels\Channel;
use Illuminate\Support\Facades\Request;

class SocialLinksTags extends Tags
{
    protected static $handle = 'social';

    public function wildcard(): string|array|null
    {
        if ($this->isPair) {
            return $this->channel()?->all();
        }

        return $this->channel()?->all()[Str::after($this->method, ':')] ?? null;
    }

    public function profile(): ?string
    {
        return $this->channel()?->profileUrl();
    }

    public function share(): ?string
    {
        return $this->channel()?->shareUrl();
    }

    public function name(): ?string
    {
        return $this->channel()?->name();
    }

    protected function channel(): ?Channel
    {
        $this->params['channel'] = $this->params->get('channel') ?? Str::before($this->method, ':');
        $this->params['url'] = $this->params->get('url') ?? Request::fullUrl();

        return ChannelManager::find($this->params['channel'])
            ?->params($this->params);
    }
}
