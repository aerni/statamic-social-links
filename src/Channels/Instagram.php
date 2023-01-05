<?php

namespace Aerni\SocialLinks\Channels;

use Aerni\SocialLinks\Channels\Channel;
use Aerni\SocialLinks\Concerns\WithProfileUrl;

class Instagram extends Channel
{
    use WithProfileUrl;

    protected function profileBaseUrl(): string
    {
        return 'https://www.instagram.com/';
    }
}
