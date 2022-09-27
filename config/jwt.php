<?php

return [
    "app" => [
        "secret" => env("JWT_SECRET", null),
        'ttl' => env('JWT_TTL', 60*24*7),
    ]
];
