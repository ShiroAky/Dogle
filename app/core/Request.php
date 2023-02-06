<?php

    namespace Shiroaky\Dogle\Core;

    class Request
    {

        /**
         * @return string Returns the http method by which the request is being received.
         */
        public static function getPath()
        {
            $path = $_SERVER['REQUEST_URI'] ?? '/';
            $position = strpos($path, '?');
            if ($position === false) return $path;
            return substr($path, 0, $position);
        }

        public static function get_request_body(): array
        {
            return json_decode(file_get_contents('php://input'), true);
        }

        /**
         * @return string Returns the url base path.
         */
        public static function HttpMethod()
        {
            return $_SERVER['REQUEST_METHOD'];
        }

        /**
         * @return string Returns the URI of the current request.
         */
        public static function URI()
        {
            return $_SERVER['REQUEST_URI'];
        }

    }