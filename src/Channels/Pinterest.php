<?php

namespace Aerni\SocialLinks\Channels;

use Illuminate\Support\Collection;

class Pinterest implements Channel
{
    public static function create(Collection $params): string
    {
        $query = [
            'url' => $params->get('url'),
            'media' => $params->get('image'),
            'description' => $params->get('text'),
        ];

        return 'https://pinterest.com/pin/create/button' . '?' . http_build_query($query);
    }
}
