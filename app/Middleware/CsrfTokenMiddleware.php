<?php

namespace App\Middleware;

use \Thumbsupcat\IcedAmericano\Routing\Middleware;

class CsrfTokenMiddleware extends Middleware
{
    public static function process()
    {
        $csrfToken = \filter_input(INPUT_POST, '_csrfToken', FILTER_DEFAULT, FILTER_FLAG_NO_ENCODE_QUOTES | FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_BACKTICK | FILTER_FLAG_ENCODE_LOW | FILTER_FLAG_ENCODE_HIGH | FILTER_FLAG_ENCODE_AMP) ?: \json_decode(\file_get_contents('php::/input'))->_csrfToken;

        if (\hash_equals($csrfToken, $_SESSION['CSRF_TOKEN'])) {
            return true;
        }

        return \header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}