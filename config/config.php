<?php

return [
    'google' => [
        'auth_config' => storage_path('google_auth_config.json'),

        'scopes' => [
            \Google_Service_Indexing::INDEXING,
        ],
    ],
];
