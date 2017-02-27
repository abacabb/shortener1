<?php

namespace App\Contracts\ShortUrl;


interface ShortUrlStrategyInterface
{
    public function urlToCode($url);
    public function codeToUrl($code);
}