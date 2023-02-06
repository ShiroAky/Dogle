<?php

    namespace Shiroaky\Dogle\Core;

    class Config
    {

        protected static bool $cors;
        protected static bool $errors;

        public static function use_cors(bool $option)
        {
            self::$cors = $option;
            if (!self::$cors !== true) exit;
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods:  POST, PUT, GET, DELETE');
            return self::$cors;
        }

        public static function hidde_errors(bool $option)
        {
            self::$errors = $option;
            if (!self::$errors !== true) exit;
            error_reporting(0);
            return self::$errors;
        }

    }