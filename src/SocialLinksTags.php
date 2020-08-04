<?php

namespace Aerni\SocialLinks;

use Illuminate\Support\Facades\Request;
use Statamic\Tags\Tags;

class SocialLinksTags extends Tags
{
    /**
     * The supported channels.
     *
     * @var array
     */
    protected $channels = ['facebook', 'twitter', 'linkedin', 'pinterest', 'whatsapp', 'mail'];

    /**
     * The handle of the tag.
     *
     * @var string
     */
    protected static $handle = 'social_links';

    /**
     * Maps to {{ social:tag }}
     *
     * Where `tag` is the name of the social channel
     *
     * @param $method
     * @param $args
     * @return string
     */
    public function wildcard($tag)
    {
        if ($this->isSupportedChannel($tag)) {
            return $this->createLink($tag);
        }
    }

    /**
     * Creates the social sharing links
     *
     * @param string $tag
     * @return string
     */
    public function createLink(string $tag): string
    {
        $params = $this->params();

        if ($tag === 'facebook') {
            return "https://www.facebook.com/sharer/sharer.php?u={$params['url']}&quote={$params['text']}";
        }

        if ($tag === 'twitter') {
            return "https://twitter.com/intent/tweet?url={$params['url']}&text={$params['text']}&via={$params['handle']}";
        }

        if ($tag === 'linkedin') {
            return "https://www.linkedin.com/shareArticle?mini=true&url={$params['url']}&title={$params['title']}&summary={$params['text']}&source={$params['source']}";
        }

        if ($tag === 'pinterest')
        {
            return "https://pinterest.com/pin/create/button/?url={$params['url']}&media={$params['image']}&description={$params['text']}";
        }

        if ($tag === 'whatsapp') {
            return "whatsapp://send?text={$params['url']}";
        }

        if ($tag === 'mail') {
            return "mailto:{$params['mailto']}?&cc={$params['cc']}&bcc={$params['bcc']}&subject={$params['subject']}&body={$params['body']}";
        }

        return '';
    }

    /**
     * Get all the parameters from the tag
     *
     * @return array
     */
    public function params(): array
    {
        $url = $this->params->get('url') ?? Request::fullUrl();

        return [
            'url' => rawurlencode($url),
            'title' => rawurlencode($this->params->get('title')),
            'text' => rawurlencode($this->params->get('text')),
            'source' => rawurlencode($this->params->get('source')),
            'handle' => rawurlencode($this->params->get('handle')),
            'mailto' => rawurlencode($this->params->get('mailto')),
            'cc' => rawurlencode($this->params->get('cc')),
            'bcc' => rawurlencode($this->params->get('bcc')),
            'subject' => rawurlencode($this->params->get('subject')),
            'body' => rawurlencode($this->params->get('body')),
            'image' => rawurlencode($this->params->get('image')),
        ];
    }

    /**
     * Check if the channel is supported by this addon.
     *
     * @param string $channel
     * @return bool
     */
    protected function isSupportedChannel(string $channel): bool
    {
        if (in_array($channel, $this->channels)) {
            return true;
        }

        return false;
    }

}
