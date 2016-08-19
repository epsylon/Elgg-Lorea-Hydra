<?php

class Videolist_Platform_Youtube implements Videolist_PlatformInterface
{
    public function getType()
    {
        return "youtube";
    }

    public function parseUrl($url)
    {
        $parsed = parse_url($url);
        $id = '';
        if (! empty($parsed['host'])) {
            if ($parsed['host'] === 'youtu.be') {
                // short URLs
                $id = substr($parsed['path'], 1);
            } elseif ($parsed['host'] === 'www.youtube.com'
                    && $parsed['path'] === '/watch'
                    && ! empty($parsed['query'])) {
                // long URLs
                parse_str($parsed['query'], $query);
                if (! empty($query['v'])) {
                    $id = $query['v'];
                }
            }
        }
        if ($id) {
            return array(
                'video_id' => $id,
            );
        }
        return false;
    }

    public function getData($parsed)
    {
        $video_id = $parsed['video_id'];
        // adding v3 APi google (https://www.googleapis.com/youtube/v3/videos?id=<video_id>&key=<YOUR_API_KEY>&part=snippet
//        $buffer = file_get_contents('https://gdata.youtube.com/feeds/api/videos/'.$video_id);

      $buffer = file_get_contents('https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v='.$video_id.'&format=xml');
        $xml = new SimpleXMLElement($buffer);

        return array(
            'title' => $xml->title,
//            'description' => strip_tags($xml->content),
            'thumbnail' => "https://img.youtube.com/vi/$video_id/default.jpg",
        );
    }
}
