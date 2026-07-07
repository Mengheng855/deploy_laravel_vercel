<?php

/**
 * Vercel Serverless Entry Point
 *
 * This file allows Laravel to run in a Vercel serverless environment.
 */

require __DIR__ . '/../vendor/autoload.php';

// Define temporary paths for Laravel to use since Vercel's filesystem is read-only
$tmpDir = '/tmp';
$_ENV['APP_STORAGE'] = $tmpDir . '/storage';
$_ENV['APP_BOOTSTRAP'] = $tmpDir . '/bootstrap/cache';

// Create the necessary directories in /tmp
$directories = [
    $_ENV['APP_STORAGE'] . '/app/public',
    $_ENV['APP_STORAGE'] . '/framework/cache/data',
    $_ENV['APP_STORAGE'] . '/framework/sessions',
    $_ENV['APP_STORAGE'] . '/framework/views',
    $_ENV['APP_STORAGE'] . '/logs',
    $_ENV['APP_BOOTSTRAP']
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// Bootstrap Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Override paths for serverless environment
$app->useStoragePath($_ENV['APP_STORAGE']);
$app->useBootstrapPath(dirname($_ENV['APP_BOOTSTRAP']));

// Handle the Request
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
