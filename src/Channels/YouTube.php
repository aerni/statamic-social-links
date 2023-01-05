<?php

namespace Aerni\SocialLinks\Channels;

use Aerni\SocialLinks\Channels\Channel;
use Aerni\SocialLinks\Concerns\WithProfileUrl;

class YouTube extends Channel
{
    use WithProfileUrl;

    public function profileBaseUrl(): string
    {
        return 'https://www.youtube.com/';
    }
}
