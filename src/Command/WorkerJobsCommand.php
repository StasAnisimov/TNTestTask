<?php

namespace App\Command;

use App\Factory\Interfaces\WorkerFactoryInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class WorkerJobsCommand extends Command
{
    protected static $defaultName = 'user:jobs';
    protected static $defaultDescription = 'Get worker available jobs';

    /**
     * @var WorkerFactoryInterface
     */
    private $workerFactory;

    public function __construct(WorkerFactoryInterface $workerFactory)
    {
        parent::__construct();
        $this->workerFactory = $workerFactory;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('worker-name', InputArgument::REQUIRED, 'Argument description');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        try {
            $workerName = $input->getArgument('worker-name');
            $worker = $this->workerFactory->createWorker($workerName);

            $io->success($worker->getAvailableTypeOfWorks());

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $io->error($e->getMessage());

            return Command::FAILURE;
        }

    }
}
