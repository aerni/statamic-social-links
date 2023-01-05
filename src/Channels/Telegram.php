<?php

namespace Aerni\SocialLinks\Channels;

use Aerni\SocialLinks\Channels\Channel;
use Aerni\SocialLinks\Concerns\WithShareUrl;

class Telegram extends Channel
{
    use WithShareUrl;

    public function shareBaseUrl(): string
    {
        return 'https://t.me/share/url';
    }

    public function shareUrlParams(): array
    {
        return [
            'url' => $this->params->get('url'),
            'text' => $this->params->get('text'),
        ];
    }
}
