<?php

namespace App\Http\Controllers;


use App\Contracts\ShortUrl\ShortUrlServiceInterface;
use App\Models\ShortUrl;
use Illuminate\Http\Request;

class UrlController
{
    private $shortener;

    public function __construct(ShortUrlServiceInterface $shortener)
    {
        $this->shortener = $shortener;
    }

    public function index()
    {
        return view('index');
    }

    public function list()
    {
        return view('list', [
            'links' => ShortUrl::all(),
        ]);
    }

    public function expandShortUrl($code)
    {
        $url = $this->shortener->codeToUrl($code);

        if ($url) {
            return redirect()->away($url);
        }

        return abort(404);
    }

    public function createShortUrl(Request $request)
    {
        $url = $request->get('url');
        $code = $this->shortener->urlToCode($url);

        $response = [
            'code' => 200,
            'origin_url' => $url,
            'short_url' => route('expand_short_url', ['code' => $code]),
        ];

        return response()->json($response);
    }
}
