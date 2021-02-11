<?php

namespace Aerni\SocialLinks;

use Aerni\SocialLinks\Channels\Facebook;
use Aerni\SocialLinks\Channels\Linkedin;
use Aerni\SocialLinks\Channels\Mail;
use Aerni\SocialLinks\Channels\Pinterest;
use Aerni\SocialLinks\Channels\Twitter;
use Aerni\SocialLinks\Channels\Whatsapp;
use Aerni\SocialLinks\Channels\Xing;
use Illuminate\Support\Facades\Request;
use Statamic\Tags\Tags;

class SocialLinksTags extends Tags
{
    /**
     * The handle of the tag.
     *
     * @var string
     */
    protected static $handle = 'social_links';

    /**
     * Maps to {{ social_links:channelName }}
     *
     * Where `channelName` is the name of the social channel
     *
     * @param $method
     * @param $args
     * @return string|null
     */
    public function wildcard($channelName): ?string
    {
        return $this->getSocialLink($channelName);
    }

    /**
     * Get the social sharing link by channel name
     *
     * @param string $channelName
     * @return string|null
     */
    private function getSocialLink(string $channelName): ?string
    {
        $this->params['url'] = $this->params->get('url') ?? Request::fullUrl();

        $channels = [
            'facebook' => Facebook::create($this->params),
            'linkedin' => Linkedin::create($this->params),
            'mail' => Mail::create($this->params),
            'pinterest' => Pinterest::create($this->params),
            'twitter' => Twitter::create($this->params),
            'whatsapp' => Whatsapp::create($this->params),
            'xing' => Xing::create($this->params),
        ];

        return $channels[$channelName] ?? null;
    }
}
