<?php

namespace Aerni\SocialLinks\Channels;

use Aerni\SocialLinks\Channels\Channel;
use Aerni\SocialLinks\Concerns\WithProfileUrl;
use Aerni\SocialLinks\Concerns\WithShareUrl;
use Illuminate\Support\Str;

class Twitter extends Channel
{
    use WithProfileUrl;
    use WithShareUrl;

    public function profileBaseUrl(): string
    {
        return 'https://www.twitter.com/';
    }

    public function shareBaseUrl(): string
    {
        return 'https://twitter.com/intent/tweet';
    }

    public function shareUrlParams(): array
    {
        return [
            'url' => $this->params->get('url'),
            'text' => $this->params->get('text'),
            'via' => Str::remove('@', $this->params->get('handle')),
        ];
    }
}
