<?php

return [

    'handlers' => ['slack'],

    'drivers' => [
        'slack' => [
            'api_key' => 'YOUR_SLACK_API_KEY',
            'channel' => '#general'
        ]
    ]
    
];