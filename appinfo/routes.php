<?php

return [
    'routes' => [
        // ['name' => 'board_api#preflighted_cors', 'url' => '/api/v{apiVersion}/{path}', 'verb' => 'OPTIONS', 'requirements' => ['path' => '.+']],
        ['name' => 'board_api#index', 'url' => '/api/v1/boards', 'verb' => 'GET'],
        ['name' => 'label_api#index', 'url' => '/api/v1/labels', 'verb' => 'GET'],
        ['name' => 'stack_api#index', 'url' => '/api/v1/stacks', 'verb' => 'GET'],
        ['name' => 'card_api#index', 'url' => '/api/v1/cards', 'verb' => 'GET'],
    ]
];
