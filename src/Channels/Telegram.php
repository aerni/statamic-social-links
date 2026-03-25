<?php

namespace Aerni\SocialLinks\Channels;

class Telegram extends BaseChannel
{
    protected string $shareBaseUrl = 'https://t.me/share/url';

    protected function shareUrlParams(): array
    {
        return [
            'url' => $this->params->get('url'),
            'text' => $this->params->get('text'),
        ];
    }
}
