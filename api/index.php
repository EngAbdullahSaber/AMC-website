<?php

// Don't modify public_path() if it's already defined by a .htaccess file.
if (!getenv('APP_PUBLIC_PATH')) {
    putenv('APP_PUBLIC_PATH=/public');
}

// This file may be accessed directly, so we need to manually set the application root.
$app_root = $_ENV['LAMBDA_TASK_ROOT'] ?? dirname(__DIR__);

// Handle the incoming request using Laravel
require $app_root . '/public/index.php';
