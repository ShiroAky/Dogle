<?php

    namespace Shiroaky\Dogle\Cli;

    use Shiroaky\Dogle\Core\Application as App;
    use Symfony\Component\Console\Application;
    use Shiroaky\Dogle\Cli\Commands\Serve;
    use Shiroaky\Dogle\Cli\Commands\MakeController;
    use Shiroaky\Dogle\Cli\Commands\MakeModel;

    class Cli
    {

        /**
         * @param string $root The root directory
         * @return self The bootstrap load start
         */
        public static function bootstrap(string $root): self
        {
            App::$root = $root;
            return new self();
        }

        /**
         * @return string Run the console application
         */
        public static function run()
        {

            $cli = new Application('Sharpness');

            $cli->addCommands([
                new Serve(),
                new MakeController(),
                new MakeModel()
            ]);

            $cli->run();

        }

    }