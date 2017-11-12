<?php
error_reporting(-1);
ini_set('display_errors', 'On');
if (PHP_SAPI == 'cli-server') {
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

spl_autoload_register(function ($class) {
    $filename = str_replace('\\', '/', $class) . '.php';
    $filename = str_replace('LinuxControlApi/', "../src/", $filename);
    if (file_exists($filename)) {
        require_once $filename;
    }
});

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);
require __DIR__ . '/../src/dependencies.php';
require __DIR__ . '/../src/middleware.php';
require __DIR__ . '/../src/Route/routes.php';

$app->run();
