<?php

namespace Statamic\Addons\SocialLinks;

use Statamic\Extend\Tags;
use Illuminate\Support\Facades\Request;

class SocialLinksTags extends Tags
{
    /**
     * Maps to {{ social:channel }}
     *
     * Where `channel` is the name of the social channel
     *
     * @param $method
     * @param $args
     * @return string
     */
    public function __call($method, $args)
    {
        $channel = explode(':', $this->tag, 2)[1];

        return $this->createLink($channel);
    }

    /**
     * Creates the social sharing links
     *
     * @param string $channel
     * @return string
     */
    public function createLink(string $channel): string
    {
        $params = $this->getParams();

        if ($channel === 'facebook') {
            return "https://www.facebook.com/sharer/sharer.php?u={$params['url']}&quote={$params['text']}";
        }

        if ($channel === 'twitter') {
            return "https://twitter.com/intent/tweet?url={$params['url']}&text={$params['text']}&via={$params['handle']}";
        }

        if ($channel === 'linkedin') {
            return "https://www.linkedin.com/shareArticle?mini=true&url={$params['url']}&title={$params['title']}&summary={$params['text']}&source={$params['source']}";
        }

        if ($channel === 'pinterest')
        {
            return "https://pinterest.com/pin/create/button/?url={$params['url']}&media={$params['image']}&description={$params['text']}";
        }

        if ($channel === 'whatsapp') {
            return "whatsapp://send?text={$params['url']}";
        }

        if ($channel === 'mail') {
            return "mailto:{$params['mailto']}?&cc={$params['cc']}&bcc={$params['bcc']}&subject={$params['subject']}&body={$params['body']}";
        }
    }

    /**
     * Get all the parameters from the tag
     *
     * @return array
     */
    public function getParams(): array
    {
        return [
            'url' => $this->getParam('url') ?? Request::fullUrl(),
            'title' => rawurlencode($this->getParam('title')),
            'text' => rawurlencode($this->getParam('text')),
            'source' => rawurlencode($this->getParam('source')),
            'handle' => rawurlencode($this->getParam('handle')),
            'mailto' => rawurlencode($this->getParam('mailto')),
            'cc' => rawurlencode($this->getParam('cc')),
            'bcc' => rawurlencode($this->getParam('bcc')),
            'subject' => rawurlencode($this->getParam('subject')),
            'body' => rawurlencode($this->getParam('body')),
            'image' => rawurlencode($this->getParam('image')),
        ];
    }

}
