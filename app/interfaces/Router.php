<?php

    namespace Shiroaky\Dogle\Interfaces;

    interface RouterInterface
    {

        /**
         * Router method get
         * @param string $path It is the value that stores the route that will then be executed when necessary.
         * @param callabe $callback It is the function or parameter that is executed when the route is called.
         * @return string router get method
         */
        public static function get(string $path, callable $callback);

        /**
         * Router method get
         * @param string $path It is the value that stores the route that will then be executed when necessary.
         * @param callable $callback It is the function or parameter that is executed when the route is called.
         * @return string router post method
         */
        public static function post(string $path, callable $callback);

        /**
         * @return void Solve all the routes stored in the application.
         */
        public static function resolve();

    }