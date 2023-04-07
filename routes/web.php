<?php

    // Namespaces:
    use Shiroaky\Dogle\Core\Router;
    use Shiroaky\Dogle\Core\Render;

    // Controllers:
    use Shiroaky\Dogle\Controllers\HomeController;

    // Test:
    use Shiroaky\Dogle\Controllers\TestController;

    // Routes:
    Router::get('/', [ MoviesController::class, 'show' ]);

    // Test routes:
    Router::post('/', [ TestController::class, 'index' ]);
