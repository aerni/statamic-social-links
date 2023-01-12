<?php

namespace Aerni\SocialLinks\Channels;

use Aerni\SocialLinks\Channels\Channel;
use Aerni\SocialLinks\Concerns\WithShareUrl;

class WhatsApp extends Channel
{
    use WithShareUrl;

    public function shareBaseUrl(): string
    {
        return 'whatsapp://send';
    }

    public function shareUrlParams(): array
    {
        return [
            'text' => $this->params->get('url'),
        ];
    }
}
