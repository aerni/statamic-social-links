<?php

namespace Aerni\SocialLinks\Channels;

use Illuminate\Support\Collection;

class Linkedin implements Channel
{
    public static function create(Collection $params): string
    {
        $query = [
            'mini' => 'true',
            'url' => $params->get('url'),
            'title' => $params->get('title'),
            'summary' => $params->get('text'),
            'source' => $params->get('source'),
        ];

        return 'https://www.linkedin.com/shareArticle' . '?' . http_build_query($query);
    }
}
