<?php

namespace Aerni\SocialLinks\Concerns;

use Statamic\Facades\URL;

trait WithProfileUrl
{
    abstract protected function profileBaseUrl(): string;

    public function profileUrl(): string
    {
        return URL::assemble($this->profileBaseUrl(), $this->params->get('handle'));
    }
}
