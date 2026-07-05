<?php

/**
 * Vercel Serverless Entry Point
 * 
 * This file allows Laravel to run in Vercel's serverless environment.
 */

require __DIR__ . '/../vendor/autoload.php';

// Bootstrap the Laravel application
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Adjust path configuration for read-only Vercel environment
$app->useStoragePath($_ENV['APP_STORAGE'] ?? '/tmp/storage');
$app->useBootstrapPath($_ENV['APP_BOOTSTRAP'] ?? '/tmp/bootstrap');

// Ensure the required temporary directories exist
$directories = [
    $app->storagePath('framework/views'),
    $app->storagePath('framework/cache/data'),
    $app->storagePath('framework/sessions'),
    $app->storagePath('logs'),
    $app->bootstrapPath('cache'),
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0777, true);
    }
}

// Capture and handle the incoming request
$app->handleRequest(Illuminate\Http\Request::capture());
