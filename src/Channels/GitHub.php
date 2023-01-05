<?php

namespace Aerni\SocialLinks\Channels;

use Aerni\SocialLinks\Channels\Channel;
use Aerni\SocialLinks\Concerns\WithProfileUrl;

class GitHub extends Channel
{
    use WithProfileUrl;

    public function profileBaseUrl(): string
    {
        return 'https://github.com/';
    }
}
