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
            'body' => implode('. ', [$params->get('url'), $params->get('body')]),
        ];

        return 'mailto:' . $params->get('mailto') . '?' . http_build_query($query);
    }
}
