<?php

namespace Aerni\SocialLinks\Channels;

use Illuminate\Support\Collection;

class Facebook implements Channel
{
    public static function create(Collection $params): string
    {
        $query = [
            'u' => $params->get('url'),
            'quote' => $params->get('text'),
        ];

        return 'https://www.facebook.com/sharer/sharer.php' . '?' . http_build_query($query);
    }
}
