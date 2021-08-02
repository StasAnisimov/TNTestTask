<?php

namespace App\Factory;

use App\Factory\Interfaces\WorkerFactoryInterface,
    App\Worker\Designer,
    App\Worker\Interfaces\WorkerInterface,
    App\Worker\Manager,
    App\Worker\SoftwareDeveloper,
    App\Worker\SoftwareTester;

class WorkerFactory implements WorkerFactoryInterface
{
    public function createWorker(string $workerName): WorkerInterface
    {
        switch ($workerName) {
            case 'designer':
                return new Designer();
            case 'tester':
                return new SoftwareTester();
            case 'developer':
                return new SoftwareDeveloper();
            case 'manager':
                return new Manager();
            default:
                throw new \InvalidArgumentException('Invalid worker name');
        }
    }
}