<?php

namespace Aerni\SocialLinks\Concerns;

trait WithShareUrl
{
    abstract protected function shareBaseUrl(): string;

    abstract protected function shareUrlParams(): array;

    public function shareUrl(): string
    {
        return $this->shareBaseUrl() . '?' . urldecode(http_build_query($this->shareUrlParams()));
    }
}
