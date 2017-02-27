<?php

namespace App\Exceptions;


class BaseHttpException extends BaseException
{
    public $httpCode = 400;
}