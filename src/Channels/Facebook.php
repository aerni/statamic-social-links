<?php

namespace Aerni\SocialLinks\Channels;

use Aerni\SocialLinks\Channels\Channel;
use Aerni\SocialLinks\Concerns\WithShareUrl;
use Aerni\SocialLinks\Concerns\WithProfileUrl;

class Facebook extends Channel
{
    use WithProfileUrl;
    use WithShareUrl;

    protected function profileBaseUrl(): string
    {
        return 'https://www.facebook.com/in/';
    }

    protected function shareBaseUrl(): string
    {
        return 'https://www.facebook.com/sharer/sharer.php';
    }

    protected function shareUrlParams(): array
    {
        return [
            'u' => $this->params->get('url'),
            'quote' => $this->params->get('text'),
        ];
    }
}
