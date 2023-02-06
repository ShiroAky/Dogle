<?php

    namespace Shiroaky\Dogle\Cli\Commands;

    use Shiroaky\Dogle\Core\Application as App;
    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputArgument;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Output\OutputInterface;

    class MakeController extends Command
    {

        protected static $defaultName = 'make:controller';
        protected static $defaultDescription = 'Create a new controller';

        protected function configure()
        {
            $this
                ->addArgument('name', InputArgument::REQUIRED, 'Controller name');
        }

        protected function execute(InputInterface $input, OutputInterface $output)
        {
            $name = $input->getArgument('name');
            $dir = App::$root . '\app\Templates\ControllerTemplate.php';

            $template = file_get_contents($dir);
            $template = str_replace('TemplateController', $name, $template);
            file_put_contents(App::$root . "/app/controllers/$name.php", $template);

            $output->writeln("<info>Controller created => $name.php</info>");
            return Command::SUCCESS;
        }

    }