<?php

return [
    'routes' => [
        // ['name' => 'board_api#preflighted_cors', 'url' => '/api/v{apiVersion}/{path}', 'verb' => 'OPTIONS', 'requirements' => ['path' => '.+']],
        ['name' => 'board_api#index', 'url' => '/api/v{apiVersion}/boards', 'verb' => 'GET'],
        ['name' => 'label_api#index', 'url' => '/api/v{apiVersion}/labels', 'verb' => 'GET'],
    ]
];
