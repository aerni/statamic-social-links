<?php

namespace Aerni\SocialLinks\Channels;

use Aerni\SocialLinks\Channels\Channel;
use Aerni\SocialLinks\Concerns\WithShareUrl;

class Mail extends Channel
{
    use WithShareUrl;

    public function shareBaseUrl(): string
    {
        return 'mailto:' . $this->params->get('to');
    }

    public function shareUrlParams(): array
    {
        return [
            'cc' => $this->params->get('cc'),
            'bcc' => $this->params->get('bcc'),
            'subject' => $this->params->get('subject'),
            'body' => $this->params->get('body') ?? $this->params->get('url'),
        ];
    }
}
