<?php

namespace Aerni\SocialLinks\Concerns;

trait WithShareUrl
{
    abstract protected function shareBaseUrl(): string;

    abstract protected function shareUrlParams(): array;

    public function shareUrl(): string
    {
        $query = http_build_query($this->shareUrlParams());

        if ($this->decodeShareUrlQuery) {
            $query = urldecode($query);
        }

        return $this->shareBaseUrl() . '?' . $query;
    }
}
