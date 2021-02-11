<?php

namespace Aerni\SocialLinks\Channels;

use Illuminate\Support\Collection;

class Mail implements Channel
{
    public static function create(Collection $params): string
    {
        $query = [
            'cc' => $params->get('cc'),
            'bcc' => $params->get('bcc'),
            'subject' => $params->get('subject'),
            'body' => $params->get('body') ?? $params->get('url')
        ];

        return 'mailto:' . $params->get('to') . '?' . urldecode(http_build_query($query));
    }
}
