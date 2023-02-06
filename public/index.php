<?php

    // Required autoload from composer
    require_once __DIR__ . '/../vendor/autoload.php';

    use Shiroaky\Dogle\Core\Application;

    Application::set_content_type('json');
    Application::run(__DIR__ . '/../');