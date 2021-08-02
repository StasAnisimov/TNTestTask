<?php

namespace App\Command;

use App\Factory\Interfaces\WorkerFactoryInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class WorkerCanCommand extends Command
{
    protected static $defaultName = 'user:can';
    protected static $defaultDescription = 'Check if worker can this job';

    private $workerFactory;

    public function __construct(WorkerFactoryInterface $workerFactory)
    {
        parent::__construct();
        $this->workerFactory = $workerFactory;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('worker-name', InputArgument::REQUIRED, 'Worker name')
            ->addArgument('job-name', null, InputArgument::REQUIRED, 'Job name');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        try {
            $workerName = $input->getArgument('worker-name');
            $jobName = $input->getArgument('job-name');

            $worker = $this->workerFactory->createWorker($workerName);

            $io->success($worker->canDo($jobName) ? "can" : "cant");

            return Command::SUCCESS;
        } catch (\Exception $exception) {
            $io->error($exception->getMessage());

            return Command::FAILURE;
        }

    }
}
