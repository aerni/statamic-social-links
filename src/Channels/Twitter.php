<?php

namespace Aerni\SocialLinks\Channels;

use Aerni\SocialLinks\Channels\Channel;
use Aerni\SocialLinks\Concerns\WithProfileUrl;
use Aerni\SocialLinks\Concerns\WithShareUrl;

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
            'via' => $this->params->get('handle'),
        ];
    }
}
