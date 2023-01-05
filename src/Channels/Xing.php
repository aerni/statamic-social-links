<?php

namespace Aerni\SocialLinks\Channels;

use Aerni\SocialLinks\Channels\Channel;
use Aerni\SocialLinks\Concerns\WithProfileUrl;
use Aerni\SocialLinks\Concerns\WithShareUrl;

class Xing extends Channel
{
    use WithProfileUrl;
    use WithShareUrl;

    public function profileBaseUrl(): string
    {
        return 'https://www.xing.com/profile/';
    }

    public function shareBaseUrl(): string
    {
        return 'https://www.xing.com/spi/shares/new';
    }

    public function shareUrlParams(): array
    {
        return [
            'url' => $this->params->get('url'),
        ];
    }
}
