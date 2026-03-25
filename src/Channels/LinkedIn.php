<?php

namespace Aerni\SocialLinks\Channels;

class LinkedIn extends BaseChannel
{
    protected string $shareBaseUrl = 'https://www.linkedin.com/shareArticle';

    protected function profileBaseUrl(): string
    {
        return match ($this->params->get('type')) {
            'company' => 'https://www.linkedin.com/company',
            default => 'https://www.linkedin.com/in',
        };
    }

    protected function shareUrlParams(): array
    {
        return [
            'mini' => 'true',
            'url' => $this->params->get('url'),
            'title' => $this->params->get('title'),
            'summary' => $this->params->get('text'),
            'source' => $this->params->get('source'),
        ];
    }
}
