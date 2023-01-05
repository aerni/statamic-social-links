<?php

namespace Aerni\SocialLinks\Channels;

use Illuminate\Support\Collection;

class Channel
{
    protected Collection $params;

    public function __construct()
    {
        $this->params = collect();
    }

    public function params(Collection $params): self
    {
        $this->params = $params;

        return $this;
    }

    public function all(): array
    {
        return array_filter([
            'profile' => method_exists($this, 'profileUrl') ? $this->profileUrl() : null,
            'share' => method_exists($this, 'shareUrl') ? $this->shareUrl() : null,
            'name' => $this->name(),
        ]);
    }

    public function name(): string
    {
        return class_basename($this);
    }

    public function handle(): string
    {
        return strtolower($this->name());
    }
}
