<?php

namespace Aerni\SocialLinks\Channels;

use Aerni\SocialLinks\Channels\Channel;
use Aerni\SocialLinks\Concerns\WithProfileUrl;
use Aerni\SocialLinks\Concerns\WithShareUrl;

class LinkedIn extends Channel
{
    use WithProfileUrl;
    use WithShareUrl;

    public function profileBaseUrl(): string
    {
        return match (true) {
            ($this->params->get('type') === 'company') => 'https://www.linkedin.com/company/',
            default => 'https://www.linkedin.com/in/',
        };
    }

    public function shareBaseUrl(): string
    {
        return 'https://www.linkedin.com/shareArticle';
    }

    public function shareUrlParams(): array
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
