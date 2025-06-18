<?php

return [
    'manifest_path' => $_SERVER['DOCUMENT_ROOT'] . '/build/manifest.json',

    'hot_file' => $_SERVER['DOCUMENT_ROOT'] . '/hot',

    'build_directory' => 'build',

    'asset_url' => null,

    'ssr' => [
        'enabled' => false,
        'entry' => 'resources/js/app.js',
        'manifest_path' => $_SERVER['DOCUMENT_ROOT'] . '/build/manifest.json',
    ],
];
