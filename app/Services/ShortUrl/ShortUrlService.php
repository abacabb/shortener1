<?php

namespace App\Services\ShortUrl;


use App\Contracts\ShortUrl\ShortUrlServiceInterface;
use App\Contracts\ShortUrl\ShortUrlStrategyInterface;
use App\Exceptions\InvalidUrlException;
use Illuminate\Contracts\Validation\Factory as Validation;

class ShortUrlService implements ShortUrlServiceInterface
{
    private $shortenerStrategy;
    private $validation;

    const URL_VALIDATE_RULES = 'bail|required|url|max:4555';

    public function __construct(ShortUrlStrategyInterface $shortUrlStrategy, Validation $validation)
    {
        $this->shortenerStrategy = $shortUrlStrategy;
        $this->validation = $validation;
    }

    public function urlToCode($url)
    {
        $this->validateUrl($url);

        return $this->shortenerStrategy->urlToCode($url);
    }

    public function codeToUrl($code)
    {
        $url = $this->shortenerStrategy->codeToUrl($code);

        return $url;
    }

    protected function validateUrl($url)
    {
        $validator = $this->validation->make(['url' => $url], [
            'url' => static::URL_VALIDATE_RULES,
        ]);

        if ($validator->fails()) {
            throw new InvalidUrlException($validator->getMessageBag()->first());
        }
    }
}
