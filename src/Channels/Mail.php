<?php

namespace Aerni\SocialLinks\Channels;

class Mail extends BaseChannel
{
    protected bool $encodeShareUrlQuery = false;

    protected function shareBaseUrl(): string
    {
        return 'mailto:'.$this->params->get('to');
    }

    protected function shareUrlParams(): array
    {
        return [
            'cc' => $this->params->get('cc'),
            'bcc' => $this->params->get('bcc'),
            'subject' => $this->params->get('subject'),
            'body' => $this->params->get('body') ?? $this->params->get('url'),
        ];
    }
}
