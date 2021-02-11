<?php

namespace Aerni\SocialLinks\Channels;

use Illuminate\Support\Collection;

class Twitter implements Channel
{
    public static function create(Collection $params): string
    {
        $query = [
            'url' => $params->get('url'),
            'text' => $params->get('text'),
            'via' => $params->get('handle'),
        ];

        return 'https://twitter.com/intent/tweet' . '?' . http_build_query($query);
    }
}
