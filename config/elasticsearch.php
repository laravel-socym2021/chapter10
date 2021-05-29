<?php

return [
    'hosts' => [
        // elasticsearchのhostを環境に合わせて指定してください
        env('ELASTICSEARCH_HOST', 'es01:9200'),
    ]
];
