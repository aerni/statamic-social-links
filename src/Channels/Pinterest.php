<?php

namespace Aerni\SocialLinks\Channels;

use Aerni\SocialLinks\Channels\Channel;
use Aerni\SocialLinks\Concerns\WithProfileUrl;
use Aerni\SocialLinks\Concerns\WithShareUrl;

class Pinterest extends Channel
{
    use WithProfileUrl;
    use WithShareUrl;

    public function profileBaseUrl(): string
    {
        return 'https://www.pinterest.com/';
    }

    public function shareBaseUrl(): string
    {
        return 'https://www.pinterest.com/pin/create/button/';
    }

    public function shareUrlParams(): array
    {
        return [
            'url' => $this->params->get('url'),
            'media' => $this->params->get('image'),
            'description' => $this->params->get('text'),
        ];
    }
}
