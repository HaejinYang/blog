<?php

use Thumbsupcat\IcedAmericano\Application;

$app = new Application([
    App\Provider\TimeZoneServiceProvider::class,
    App\Provider\ErrorServiceProvider::class,
    App\Provider\DatabaseServiceProvider::class,
    App\Provider\SessionServiceProvider::class,
    App\Provider\ThemeServiceProvider::class,
    App\Provider\RouteServiceProvider::class
]);


return $app;