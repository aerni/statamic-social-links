<?php

namespace Aerni\SocialLinks\Channels;

use Illuminate\Support\Collection;

class Telegram implements Channel
{
    public static function create(Collection $params): string
    {
        $query = [
            'url' => $params->get('url'),
            'text' => $params->get('text'),
        ];

        return 'https://t.me/share/url' . '?' . http_build_query($query);
    }
}
