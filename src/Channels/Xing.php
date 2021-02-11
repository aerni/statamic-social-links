<?php

namespace Aerni\SocialLinks\Channels;

use Illuminate\Support\Collection;

class Xing implements Channel
{
    public static function create(Collection $params): string
    {
        $query = [
            'url' => $params->get('url'),
        ];

        return 'https://www.xing.com/spi/shares/new' . '?' . http_build_query($query);
    }
}
