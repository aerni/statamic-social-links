<?php

namespace Aerni\SocialLinks\Channels;

class WhatsApp extends BaseChannel
{
    protected string $shareBaseUrl = 'whatsapp://send';

    protected function shareUrlParams(): array
    {
        return [
            'text' => $this->params->get('url'),
        ];
    }
}
