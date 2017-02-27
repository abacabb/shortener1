<?php

$router = app('router');

$router->get('/', 'UrlController@index');
$router->get('/list', 'UrlController@list')->name('list');
$router->get('/{code}', 'UrlController@expandShortUrl')->name('expand_short_url');
