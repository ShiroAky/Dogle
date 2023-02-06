<?php

    namespace Shiroaky\Dogle\Core;

    use Dotenv\Dotenv;
    use Shiroaky\Dogle\Core\Router;
    use Shiroaky\Dogle\Core\AutoloadInterfaces;
    use Shiroaky\Dogle\Core\Config;

    require_once('./app/core/Autoload_Interfaces.php');

    class Application
    {

        public static string $root;

        /**
         * @param string $directory The main directory
         * @return void Run application.
         */
        public static function run(string $directory)
        {
            session_start();
            
            $dotenv = Dotenv::createImmutable($directory);
            $dotenv->load();
            AutoloadInterfaces::load_Interfaces();

            require_once('./routes/web.php');
            Router::resolve();

            Config::hidde_errors(true);
            Config::use_cors(true);
        }

        /**
         * @param string $content The content type of application example 'json' | 'html' | 'text', etc.
         */
        public static function set_content_type(string $content) 
        {
            header("Content-Type: application/$content; charset=utf-8");
        }

    }