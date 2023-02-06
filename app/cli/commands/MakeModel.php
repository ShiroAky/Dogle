<?php

    namespace Shiroaky\Dogle\Cli\Commands;

    use Shiroaky\Dogle\Core\Application as App;
    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputArgument;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Input\InputOption;
    use Symfony\Component\Console\Output\OutputInterface;

    class MakeModel extends Command
    {

        protected static $defaultName = 'make:model';
        protected static $defaultDescription = 'Create a new model';

        protected function configure()
        {
            $this
                ->addArgument('name', InputArgument::REQUIRED, 'Model name')
                ->addOption('migration', 'm', InputOption::VALUE_OPTIONAL, 'Also create migration file', false);
        }

        protected function execute(InputInterface $input, OutputInterface $output)
        {
            $name = $input->getArgument('name');
            $migration = $input->getOption('migration');
            
            $dir = App::$root . '\app\Templates\ModelTemplate.php';

            $template = file_get_contents($dir);
            $template = str_replace('TemplateModel', $name, $template);
            file_put_contents(App::$root . "/app/models/$name.php", $template);

            $output->writeln("<info>Model created => $name.php</info>");
            return Command::SUCCESS;
        }

    }