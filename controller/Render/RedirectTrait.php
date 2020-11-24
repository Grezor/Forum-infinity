<?php

namespace App\Render;

use Exception;

trait RedirectTrait
{
    public static $httpCode = [
        301 => 'Moved Permanently',
        307 => 'Temporary Redirect'
    ];

    protected function redirectTo(string $url, int $code = 301)
    {
        $httpCodeDesc = self::$httpCode[$code] ?? null;
        if ($httpCodeDesc === null) {
            throw new Exception("Http code for redirection not found : {$code}");
        }

        header("HTTP/1.1 {$code} {$httpCodeDesc}", true, $code);
        header("Location: {$url}");
        exit(0);
    }
}
