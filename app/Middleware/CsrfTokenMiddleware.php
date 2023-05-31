<?php

namespace App\Middleware;

use \Thumbsupcat\IcedAmericano\Routing\Middleware;

class CsrfTokenMiddleware extends Middleware
{
    public static function process()
    {
        $csrfToken = \filter_input(INPUT_POST, '_csrfToken', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?: \json_decode(\file_get_contents('php://input'))->_csrfToken;

        if (\hash_equals($csrfToken, $_SESSION['CSRF_TOKEN'])) {
            return true;
        }

        return \header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}