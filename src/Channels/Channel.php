<?php

namespace Aerni\SocialLinks\Channels;

use Illuminate\Support\Collection;

interface Channel
{
    public static function create(Collection $params): string;
}
