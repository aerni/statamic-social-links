<?php

namespace Aerni\SocialLinks\Channels;

class Xing extends BaseChannel
{
    protected string $profileBaseUrl = 'https://www.xing.com/profile';

    protected string $shareBaseUrl = 'https://www.xing.com/spi/shares/new';

    protected function shareUrlParams(): array
    {
        return [
            'url' => $this->params->get('url'),
        ];
    }
}
