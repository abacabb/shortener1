<?php

namespace App\Exceptions;


class UnknownShortURLException extends BaseException
{
    protected $message = 'Short URL not found!';
}