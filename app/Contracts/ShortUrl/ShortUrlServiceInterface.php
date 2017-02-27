<?php

namespace App\Contracts\ShortUrl;


interface ShortUrlServiceInterface
{
    public function urlToCode($url);

    public function codeToUrl($code);
}