<?php

namespace Aerni\SocialLinks\Channels;

use Illuminate\Support\Str;

class Twitter extends BaseChannel
{
    protected string $profileBaseUrl = 'https://www.twitter.com';

    protected string $shareBaseUrl = 'https://twitter.com/intent/tweet';

    protected function shareUrlParams(): array
    {
        return [
            'url' => $this->params->get('url'),
            'text' => $this->params->get('text'),
            'via' => Str::remove('@', $this->params->get('handle')),
        ];
    }
}
