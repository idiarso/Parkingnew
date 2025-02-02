<?php

return [
    'endpoint' => env('ANPR_API_ENDPOINT', 'http://anpr-server/api'),
    'api_key' => env('ANPR_API_KEY'),
    'timeout' => env('ANPR_TIMEOUT', 10),
    'storage' => [
        'disk' => 'local',
        'directory' => 'parking-images'
    ],
    'validation' => [
        'min_confidence' => 0.8,
    ]
];