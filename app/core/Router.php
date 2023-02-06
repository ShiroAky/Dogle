<?php

    namespace Shiroaky\Dogle\Core;

    use Shiroaky\Dogle\Interfaces\RouterInterface;
    use Shiroaky\Dogle\Core\Request;
    use Shiroaky\Dogle\Core\Response;
    use Shiroaky\Dogle\Core\Render;

    class Router implements RouterInterface
    {

        /**
         * @return array $routes Stores all the routes of the application.
         */
        private static array $routes = [];

        public static function get(string $path, callable $callback)
        {
            $method = Request::HttpMethod();
            if ($method !== 'GET') return;
            $path = trim($path, '/');
            $path = preg_replace('/{[^}]+}/', '(.+)', $path);
            self::$routes[$path] = $callback;
        }

        public static function post(string $path, callable $callback)
        {
            $method = Request::HttpMethod();
            if ($method !== 'POST') return;
            $path = trim($path, '/');
            $path = preg_replace('/{[^}]+}/', '(.+)', $path);
            self::$routes[$path] = $callback;
        }

        public static function resolve()
        {
            $method = Request::HttpMethod();
            $path = Request::getPath();
            $uri = Request::URI();

            $callback = '';
            $action = trim($uri, '/');
            $params = [];

            foreach (self::$routes as $route => $handler) {
                if (preg_match("%^{$route}$%", $action, $matches) === 1) {
                    $callback = $handler;
                    unset($matches[0]);
                    $params = $matches;
                    break;
                }
            }

            if (!is_callable($callback) || !$callback) {
                Response::set_status_code(404);
                Render::view('_404');
                exit;
            }

            call_user_func($callback, ...$params);

        }

    }