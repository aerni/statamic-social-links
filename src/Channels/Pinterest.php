<?php

namespace Aerni\SocialLinks\Channels;

class Pinterest extends BaseChannel
{
    protected string $profileBaseUrl = 'https://www.pinterest.com';

    protected string $shareBaseUrl = 'https://www.pinterest.com/pin/create/button';

    protected function shareUrlParams(): array
    {
        return [
            'url' => $this->params->get('url'),
            'media' => $this->params->get('image'),
            'description' => $this->params->get('text'),
        ];
    }
}
