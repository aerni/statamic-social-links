<?php

namespace Aerni\SocialLinks\Channels;

use Illuminate\Support\Collection;

class Whatsapp implements Channel
{
    public static function create(Collection $params): string
    {
        $query = [
            'text' => $params->get('url'),
        ];

        return 'whatsapp://send' . '?' . http_build_query($query);
    }
}
