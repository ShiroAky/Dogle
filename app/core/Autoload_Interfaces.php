<?php

    namespace Shiroaky\Dogle\Core;

    class AutoloadInterfaces
    {

        /**
         * @return array Store all interfaces
         */
        private static mixed $interfaces;
        private static mixed $dir;

        /**
         * @return void Autoload all interfaces from App/Interfaces
         */
        public static function load_Interfaces()
        {
            self::$dir = opendir(__DIR__ . '/../interfaces/');
            $base_dir = __DIR__ . '/../interfaces/';

            while (self::$interfaces = readdir(self::$dir)) {
                if (!is_dir(self::$interfaces)) {
                    require_once $base_dir . self::$interfaces;
                }
            }
        }

    }