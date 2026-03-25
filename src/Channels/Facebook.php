<?php

namespace Aerni\SocialLinks\Channels;

class Facebook extends BaseChannel
{
    protected string $profileBaseUrl = 'https://www.facebook.com';

    protected string $shareBaseUrl = 'https://www.facebook.com/sharer/sharer.php';

    protected function shareUrlParams(): array
    {
        return [
            'u' => $this->params->get('url'),
            'quote' => $this->params->get('text'),
        ];
    }
}
