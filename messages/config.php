<?php

return [
    'sourcePath' => __DIR__ . '/..',
    'messagePath' => __DIR__,
    'languages' => ['ru'],
    'fileTypes' => ['php'],
    'overwrite' => true,
    'sort' => true,
    'removeUnused' => false,
    'except' => [
        '/vendor',
    ],
    'only' => ['*.php'],
    'format' => 'php'
];