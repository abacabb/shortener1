<?php

namespace App\Services\ShortUrl\Strategy;


use App\Contracts\ShortUrl\ShortUrlStrategyInterface;
use App\Models\ShortUrl;
use Hashids\Hashids;

class DatabaseStrategy implements ShortUrlStrategyInterface
{
    private $hashids;

    const SALT = '';
    const MIN_LENGTH = 4;

    public function __construct()
    {
        $this->hashids = new Hashids(static::SALT, static::MIN_LENGTH);
    }

    public function urlToCode($url)
    {
        $shortUrl = new ShortUrl();
        $shortUrl->original_url = $url;
        $shortUrl->save();

        $code = $this->encodeIntToCode($shortUrl->id);
        $shortUrl->code = $code;
        $shortUrl->save();

        return $code;
    }

    public function codeToUrl($code)
    {
        $id = $this->decodeCodeToInt($code);

        if (empty($id)) {
            return null;
        }

        $shortUrl = ShortUrl::where('id', $id)
            ->where('code', $code)
            ->first();

        if ($shortUrl) {
            $shortUrl->count += 1;
            $shortUrl->save();

            return $shortUrl->original_url;
        }

        return null;
    }

    private function encodeIntToCode($id)
    {
        return $this->hashids->encode($id);
    }

    private function decodeCodeToInt($code)
    {
        return $this->hashids->decode($code);
    }
}
